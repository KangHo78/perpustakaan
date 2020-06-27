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

// Front End
mix.styles([
        'resources/css/frontend/bootstrap.min.css',
        'resources/css/frontend/font-awesome.min.css',
        'resources/css/frontend/owl.carousel.min.css',
        'resources/css/frontend/customdataTables.css',
        'resources/css/backend/responsive.bootstrap4.min.css',
        'resources/css/frontend/slicknav.min.css',
        'resources/css/frontend/ekko-lightbox.css',
        'resources/css/frontend/style.css',
    ],
    'public/css/front.css');

mix.scripts([
        'resources/js/frontend/jquery-3.2.1.min.js',
        'resources/js/frontend/bootstrap.min.js',
        'resources/js/frontend/owl.carousel.min.js',
        'resources/js/frontend/jquery.slicknav.min.js',
        'resources/js/backend/jquery.dataTables.min.js',
        'resources/js/backend/dataTables.bootstrap4.min.js',
        'resources/js/backend/dataTables.responsive.min.js',
        'resources/js/frontend/ekko-lightbox.min.js',
        'resources/js/backend/jquery.inputmask.min.js',
        'resources/js/backend/inputmask.binding.js',
        'resources/js/frontend/main.js',
    ],
    'public/js/front.js');

// Back End
mix.styles([
        'resources/css/backend/all.css',
        'resources/css/backend/OverlayScrollbars.min.css',
        'resources/css/backend/select2.min.css',
        'resources/css/frontend/ekko-lightbox.css',
        'resources/css/backend/select2-bootstrap4.min.css',
        'resources/css/backend/bootstrap-datepicker.min.css',
        'resources/css/backend/dataTables.bootstrap4.min.css',
        'resources/css/backend/responsive.bootstrap4.min.css',
        'resources/css/backend/adminlte.min.css',
    ],
    'public/css/back.css');

mix.scripts([
        'resources/js/backend/jquery.min.js',
        'resources/js/backend/bootstrap.bundle.min.js',
        'resources/js/backend/fastclick.js',
        'resources/js/backend/moment.min.js',
        'resources/js/backend/bootstrap-datepicker.min.js',
        'resources/js/backend/bs-custom-file-input.min.js',
        'resources/js/backend/jquery.overlayScrollbars.min.js',
        'resources/js/backend/jquery.dataTables.min.js',
        'resources/js/backend/dataTables.bootstrap4.min.js',
        'resources/js/backend/dataTables.responsive.min.js',
        'resources/js/backend/responsive.bootstrap4.min.js',
        'resources/js/frontend/ekko-lightbox.min.js',
        'resources/js/backend/sweetalert2.all.min.js',
        'resources/js/backend/select2.full.min.js',
        'resources/js/backend/jquery.inputmask.min.js',
        'resources/js/backend/inputmask.binding.js',
        'resources/js/backend/adminlte.min.js',
    ],
    'public/js/back.js');
