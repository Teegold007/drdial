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
//HOME CSS
mix.styles([
    'public/administrator/dynamic/css/icons.css',
    'public/administrator/dynamic/css/bootstrap.css',
    'public/administrator/dynamic/css/plugins.css',
    'public/administrator/dynamic/css/main.css',
    'public/administrator/dynamic/css/custom.css'
], 'public/administrator/assets/css/all.css');

//GLOBAL JS
mix.scripts([
    'public/administrator/dynamic/plugins/core/pace/pace.min.js',
    'public/administrator/dynamic/js/jquery/jquery-2.1.1.min.js',
    'public/administrator/dynamic/js/jquery-ui.js',
    'public/administrator/dynamic/js/bootstrap/bootstrap.js',
    'public/administrator/dynamic/js/libs/modernizr.custom.js',
    'public/administrator/dynamic/js/jRespond.min.js',
    'public/administrator/dynamic/plugins/core/slimscroll/jquery.slimscroll.min.js',
    'public/administrator/dynamic/plugins/core/slimscroll/jquery.slimscroll.horizontal.min.js',
    'public/administrator/dynamic/plugins/core/fastclick/fastclick.js',
    'public/administrator/dynamic/plugins/core/velocity/jquery.velocity.min.js',
    'public/administrator/dynamic/plugins/core/quicksearch/jquery.quicksearch.js',
    'public/administrator/dynamic/plugins/core/quicksearch/ui/bootbox/bootbox.js',
    'public/administrator/dynamic/plugins/ui/notify/jquery.gritter.js'
],'public/administrator/assets/js/global.js');

mix.version();
