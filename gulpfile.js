var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.sass('app.scss')
        .scripts([
          'libs/sweetalert-dev.js',
          'libs/dropzone.js'
        ],'./public/js/libs.js')
        .styles([
          'libs/sweetalert.css',
          'libs/dropzone.css'
        ],'./public/css/libs.css')
        .version(['public/css/app.css']);
});
