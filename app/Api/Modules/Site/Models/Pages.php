<?php
/**
 * This file is part of the O2System PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */

// ------------------------------------------------------------------------

namespace App\Api\Modules\Site\Models;

// ------------------------------------------------------------------------

use O2System\Filesystem\Handlers\Uploader;
use O2System\Framework\Libraries\Ui\Contents\Lists\Unordered;
use O2System\Framework\Models\Sql\Model;
use O2System\Framework\Models\Sql\Traits\RelationTrait;
use O2System\Spl\Datastructures\SplArrayObject;

/**
 * Class Pages
 * @package App\Api\Modules\Site\Models
 */
class Pages extends Model
{
    use RelationTrait;

    /**
     * Pages::$table
     *
     * @var string
     */
    public $table = 'pages';

    /**
     * Pages::$visibleColumns
     *
     * @var array
     */
    public $visibleColumns = [
        'id',
        'title',
        'slug',
        'excerpt',
        'content',
        'visibility',
        'start_publishing',
        'finish_publishing',
    ];

    /**
     * Pages::$appendColumns
     *
     * @var array
     */
    public $appendColumns = [
        'image',
        'metadata',
    ];

    // ------------------------------------------------------------------------

    /**
     * Pages::visibilityOptions
     *
     * @return array
     */
    public function visibilityOptions()
    {
        return [
            'PUBLIC'    => language('PUBLIC'),
            'READONLY'  => language('READONLY'),
            'PROTECTED' => language('PROTECTED'),
            'PRIVATE'   => language('PRIVATE'),
        ];
    }

    // ------------------------------------------------------------------------

    /**
     * Pages::meta
     *
     * @param string $name
     *
     * @return mixed|null
     */
    public function meta($name)
    {
        if($result = models(Metadata::class)->findWhere([
            'id_page' => $this->row->id,
            'name' => $name
        ])) {
            if($result->count()) {
                return $result->first()->content;
            }
        }

        return null;
    }

    // ------------------------------------------------------------------------

    /**
     * Pages::metadata
     *
     * @return \O2System\Spl\DataStructures\SplArrayObject|null
     */
    public function metadata($input = null)
    {
        if ($input) {
            $this->qb->where('name', $input);
        }

        if ($result = $this->hasMany(Metadata::class, 'id_page')) {
            $metadata = new SplArrayObject();
            foreach ($result as $row) {
                $metadata->offsetSet($row->name, $row->content);
            }

            return $metadata;
        }

        return null;
    }

    // ------------------------------------------------------------------------

    /**
     * Pages::image
     *
     * @return string
     */
    public function image()
    {
        $this->qb->where('name', 'photo');
        if ($result = $this->hasOne(Metadata::class, 'id_page')) {
            if (is_file($filePath = PATH_STORAGE . 'images/pages/media/' . $result->content)) {
                return storage_url($filePath);
            }

            return storage_url('/images/default/no-image.jpg');
        }

        return storage_url('/images/default/no-image.jpg');
    }

    // ------------------------------------------------------------------------

    /**
     * Pages::posts
     *
     * @return bool|\O2System\Framework\Models\Sql\DataObjects\Result
     */
    public function posts()
    {
        return $this->hasMany(Posts::class, 'id_page');
    }

    // ------------------------------------------------------------------------

    /**
     * Pages::settings
     *
     * @return \O2System\Spl\DataStructures\SplArrayObject|null
     */
    public function settings()
    {
        if ($result = $this->hasMany(Settings::class, 'id_page')) {
            $setting = new SplArrayObject();
            foreach ($result as $row) {
                $setting->offsetSet($row->key, $row->value);
            }

            return $setting;
        }

        return null;
    }

    // ------------------------------------------------------------------------

    /**
     * Pages::insert
     *
     * @param array $sets
     *
     * @return bool
     * @throws \O2System\Spl\Exceptions\Logic\BadFunctionCall\BadDependencyCallException
     */
    public function insert($sets)
    {
        if ($sets) {
            $metadata = $sets[ 'meta' ];
            $settings = $sets[ 'settings' ];
            unset($sets[ 'meta' ], $sets[ 'settings' ]);

            if (parent::insert($sets)) {
                $id_page = $this->getLastInsertId();

                if (input()->files('photo')) {
                    $filePath = PATH_STORAGE . 'images/pages/media/';
                    if ( ! file_exists($filePath)) {
                        mkdir($filePath, 0777, true);
                    }

                    $upload = new Uploader();
                    $upload->setPath($filePath);
                    $upload->process('photo');

                    if ($upload->getErrors()) {
                        $errors = new Unordered();

                        foreach ($upload->getErrors() as $code => $error) {
                            $errors->createList($error);
                        }

                        output()->send([
                            'error' => $errors,
                        ]);

                    } else {
                        $filename = $upload->getUploadedFiles()->first()[ 'name' ];
                        $metadata[ 'photo' ] = $filename;
                    }
                }

                if (count($metadata)) {
                    $insertMetadata = [];

                    foreach ($metadata as $name => $content) {
                        $insertMetadata[] = [
                            'id_page'                 => $id_page,
                            'name'                    => $name,
                            'content'                 => $content,
                            'record_create_timestamp' => timestamp(),
                        ];

                    }

                    models(Metadata::class)->insertMany($insertMetadata);
                }

                if (count($settings)) {
                    $insertSettings = [];

                    foreach ($insertSettings as $key => $value) {
                        $insertSettings[] = [
                            'id_page'                 => $id_page,
                            'key'                     => $key,
                            'value'                   => $value,
                            'record_create_timestamp' => timestamp(),
                        ];
                    }

                    models(Settings::class)->insertMany($insertSettings);
                }

                return true;
            }

            return false;
        } else {
            return false;
        }
    }

    // ------------------------------------------------------------------------

    /**
     * Pages::update
     *
     * @param array $post
     * @param null  $conditions
     *
     * @return bool
     * @throws \O2System\Spl\Exceptions\Logic\BadFunctionCall\BadDependencyCallException
     * @throws \O2System\Spl\Exceptions\RuntimeException
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function update($post, $conditions = null)
    {
        if ($post) {
            if ($post[ 'record_status' ]) {
                unset($post[ 'record_status' ]);

                if (parent::update($post)) {
                    return true;
                }
            }

            $post[ 'slug' ] = dash($post['slug']);

            $metadata = $post[ 'meta' ];
            $settings = $post[ 'settings' ];

            unset($post[ 'meta' ], $post[ 'settings' ]);

            if (parent::update($post)) {
                $id_page = $post[ 'id' ];

                if (input()->files('photo')) {
                    $filePath = PATH_STORAGE . 'images/pages/media/';
                    if ( ! file_exists($filePath)) {
                        mkdir($filePath, 0777, true);
                    }

                    $upload = new Uploader();
                    $upload->setPath($filePath);
                    $upload->process('photo');

                    if ($upload->getErrors()) {
                        $errors = new Unordered();

                        foreach ($upload->getErrors() as $code => $error) {
                            $errors->createList($error);
                        }
                        $this->output->send([
                            'error' => $errors,
                        ]);
                    } else {
                        $metadata['photo'] = $upload->getUploadedFiles()->first()[ 'name' ];

                        if($result = models(Metadata::class)->findWhere([
                            'id_page' => $id_page,
                            'name' => 'photo'
                        ])) {
                            if($result->count()) {
                                if (is_file($image = $filePath . $result->first()->content)) {
                                    unlink($image);
                                }
                            }
                        }
                    }
                }

                if (count($metadata)) {
                    foreach ($metadata as $name => $content) {
                        models(Metadata::class)->insertOrUpdate([
                            'id_page' => $id_page,
                            'name'    => $name,
                            'content' => $content,
                        ], [
                            'id_page' => $id_page,
                            'name'    => $name,
                        ]);
                    }
                }

                if (count($settings)) {
                    foreach ($settings as $key => $value) {
                        models(Settings::class)->insertOrUpdate([
                            'id_page' => $id_page,
                            'key'     => $key,
                            'value'   => $value,
                        ], [
                            'id_page' => $id_page,
                            'key'     => $key,
                        ]);
                    }
                }

                return true;
            }
        }

        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * Pages::delete
     *
     * @param int|\O2System\Framework\Models\Sql\DataObjects\Result\Row $id
     *
     * @return bool
     * @throws \O2System\Spl\Exceptions\RuntimeException
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function delete($id)
    {
        if ($result = models(Metadata::class)->findWhere(['id_page' => $id, 'name' => 'photo'])) {
            if ($result->count()) {
                if (is_file($filePath = PATH_STORAGE . 'images/pages/media/' . $result->first()->content)) {
                    unlink($filePath);
                }
            }
        }

        models(Metadata::class)->deleteManyBy(['id_page' => $id]);
        models(Settings::class)->deleteManyBy(['id_page' => $id]);

        return parent::delete($id);
    }
}
