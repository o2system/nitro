<?php
/**
 * This file is part of the O2System Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */

// ------------------------------------------------------------------------

namespace O2System\Framework\Cli\Commanders\Make;

// ------------------------------------------------------------------------

use O2System\Framework\Cli\Commanders\Make;
use O2System\Kernel\Cli\Writers\Format;

/**
 * Class Helper
 *
 * @package O2System\Framework\Cli\Commanders\Make
 */
class Helper extends Make
{
    /**
     * Helper::$commandDescription
     *
     * Command description.
     *
     * @var string
     */
    protected $commandDescription = 'CLI_MAKE_HELPER_DESC';

    // ------------------------------------------------------------------------

    /**
     * Helper::execute
     */
    public function execute()
    {
        parent::execute();

        if (empty($this->optionFilename)) {
            output()->write(
                (new Format())
                    ->setContextualClass(Format::DANGER)
                    ->setString(language()->getLine('CLI_MAKE_HELPER_E_FILENAME'))
                    ->setNewLinesAfter(1)
            );

            exit(EXIT_ERROR);
        }

        if (strpos($this->optionPath, 'Helpers') === false) {
            $filePath = $this->optionPath . 'Helpers' . DIRECTORY_SEPARATOR . $this->optionFilename;
        } else {
            $filePath = $this->optionPath . $this->optionFilename;
        }

        $fileDirectory = dirname($filePath) . DIRECTORY_SEPARATOR;

        if ( ! is_dir($fileDirectory)) {
            mkdir($fileDirectory, 0777, true);
        }

        if (is_file($filePath)) {
            output()->write(
                (new Format())
                    ->setContextualClass(Format::DANGER)
                    ->setString(language()->getLine('CLI_MAKE_HELPER_E_EXISTS', [$filePath]))
                    ->setNewLinesAfter(1)
            );

            exit(EXIT_ERROR);
        }

        $vars[ 'CREATE_DATETIME' ] = date('d/m/Y H:m');
        $vars[ 'HELPER' ] = underscore(
            snakecase(
                pathinfo($filePath, PATHINFO_FILENAME)
            )
        );
        $vars[ 'FILEPATH' ] = $filePath;

        $phpTemplateFilePaths = $this->getFilePaths(true);

        foreach($phpTemplateFilePaths as $phpTemplateFilePath)
        {
            if(is_file($phpTemplateFilePath . 'Helper.tpl')) {
                $phpTemplate = file_get_contents($phpTemplateFilePath . 'Helper.tpl');
                break;
            }
        }

        $fileContent = str_replace(array_keys($vars), array_values($vars), $phpTemplate);
        file_put_contents($filePath, $fileContent);

        if (is_file($filePath)) {
            output()->write(
                (new Format())
                    ->setContextualClass(Format::SUCCESS)
                    ->setString(language()->getLine('CLI_MAKE_HELPER_S_MAKE', [$filePath]))
                    ->setNewLinesAfter(1)
            );

            exit(EXIT_SUCCESS);
        }
    }
}