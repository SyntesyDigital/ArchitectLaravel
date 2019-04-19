let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | ARCHITECT BUILD ASSETS
 |--------------------------------------------------------------------------
 |
 |  TODO : Perhaps we can make a npm plugin ?
 |  Read architect modules webpack.build.js and build assets
 |
 */
const ArchitectBuilds = [];

// !! DON'T REMOVE THIS !!
// {ARCHITECT:BUILD}
// ArchitectBuilds.push(require('./Modules/Architect/webpack.build.js'));
//

ArchitectBuilds.map(function(build){

    var _build = build.build;

    // ReactJS
    if(_build.react !== undefined) {
        mix.react(_build.react.src, _build.react.path);
    }

    // SASS
    if(_build.sass !== undefined) {
        mix.sass(_build.sass.src, _build.sass.path);
    }

    // Scripts
    if(_build.scripts !== undefined) {
        mix.scripts(_build.scripts.src, _build.scripts.path);
    }
});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.react('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
