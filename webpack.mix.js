const mix = require('laravel-mix');

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

mix.styles([
        'resources/css/frontend/bootstrap.min.css',
        'resources/css/frontend/font-awesome.min.css',
        'resources/css/frontend/owl.carousel.min.css',
        'resources/css/frontend/slicknav.min.css',
        'resources/css/frontend/style.css',
    ],
    'public/css/front.css');

mix.scripts([
        'resources/js/frontend/jquery-3.2.1.min.js',
        'resources/js/frontend/bootstrap.min.js',
        'resources/js/frontend/jquery.slicknav.min.js',
        'resources/js/frontend/owl.carousel.min.js',
        'resources/js/frontend/main.js',
    ],
    'public/js/front.js');
