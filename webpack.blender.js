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

var blender = require('o2system-blender');
blender.setOutputPath('assets/');

if (typeof process.env.npm_config_module !== "undefined") {
    blender.js(
        './resources/modules/' + process.env.npm_config_module + '/module.js',
        './public/modules/' + process.env.npm_config_module
    ).sass(
        './resources/modules/' + process.env.npm_config_module + '/module.scss',
        './public/modules/' + process.env.npm_config_module
    );
} else if(typeof process.env.npm_config_app !== "undefined") {
    blender.js('./resources/' + process.env.npm_config_app + '/app.js', './public/' + process.env.npm_config_app)
        .sass('./resources/' + process.env.npm_config_app + '/app.scss', './public/' + process.env.npm_config_app).
    sourceMaps();

    if(typeof process.env.npm_config_theme !== "undefined") {
        blender.js(
            './resources/' + process.env.npm_config_app + '/themes/' + process.env.npm_config_theme + '/theme.js',
            './public/' + process.env.npm_config_app + '/themes/' + process.env.npm_config_theme
        ).sass(
            './resources/' + process.env.npm_config_app + '/themes/' + process.env.npm_config_theme + '/theme.scss',
            './public/' + process.env.npm_config_app + '/themes/' + process.env.npm_config_theme
        );
    }
} else {
    blender.js('./resources/app.js', 'assets')
        .sass('./resources/app.scss', 'assets').
    sourceMaps();

    if(typeof process.env.npm_config_theme !== "undefined") {
        blender.js(
            './resources/themes/' + process.env.npm_config_theme + '/theme.js',
            './public/themes/' + process.env.npm_config_theme
        ).sass(
            './resources/themes/' + process.env.npm_config_theme + '/theme.scss',
            './public/themes/' + process.env.npm_config_theme
        );
    }
}