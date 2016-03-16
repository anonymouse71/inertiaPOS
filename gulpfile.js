var elixir = require('laravel-elixir');

var bower_path = '../../../bower_components/'; // relative to each assets' folder

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.copy('bower_components/bootstrap/dist/fonts', 'public/fonts'); // copy bootstrap's fonts
    mix.copy('bower_components/font-awesome/fonts', 'public/fonts'); // copy fontawesome's fonts
    mix.copy('bower_components/Ionicons/fonts', 'public/fonts'); // copy ionicon's fonts

    //mix.browserify('main.js');

    mix.sass([
        bower_path + 'bootstrap/dist/css/bootstrap.css',

        // datatables
        bower_path + 'datatables/media/css/dataTables.bootstrap.css',
        bower_path + 'datatables-responsive/css/responsive.bootstrap.scss',

        bower_path + 'font-awesome/css/font-awesome.css',
        bower_path + 'Ionicons/css/ionicons.css',
        bower_path + 'AdminLTE/dist/css/AdminLTE.css',
        bower_path + 'AdminLTE/dist/css/skins/skin-blue.css'
    ], 'public/css/all.css');

    mix.scripts([
        bower_path + 'jquery/dist/jquery.min.js'
    ], 'public/js/jquery.js');

    mix.sass('app.scss');


    mix.scripts([
        // jquery turbolinks right after jquery
        'jquery.turbolinks.js',

        // other scripts goes here
        bower_path + 'jquery-ujs/src/rails.js',
        bower_path + 'pace/pace.js',
        bower_path + 'bootstrap/dist/js/bootstrap.js', // TODO use individual scripts that are needed
        bower_path + 'fastclick/lib/fastclick.js',
        bower_path + 'slimScroll/jquery.slimscroll.js',
        bower_path + 'AdminLTE/dist/js/app.js', // AdminLTE scripts

        // datatables
        bower_path + 'datatables/media/js/jquery.dataTables.js',
        bower_path + 'datatables/media/js/dataTables.bootstrap.js',
        bower_path + 'datatables-responsive/js/dataTables.responsive.js',
        bower_path + 'datatables-responsive/js/responsive.bootstrap.js',

        'app.js',

        // turbolinks at the end to catch all request
        'turbolinks.js'
    ]);
});
