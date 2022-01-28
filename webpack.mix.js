let mix = require('laravel-mix');

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

mix.copy('resources/assets/js/jquery-3.2.1.min.js', 'public/js')
    .sass('resources/assets/sass/materialize.scss', 'public/css')
    .copy('resources/assets/js/materialize.min.js', 'public/js')
    .copy('resources/assets/css/custom.css', 'public/css')
    .copy('resources/assets/css/material-icons.css', 'public/css')
    .copy('resources/assets/fonts', 'public/fonts');
