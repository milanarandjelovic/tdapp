const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
  mix.sass([
    './node_modules/toastr/build/toastr.css',
    './node_modules/sweetalert/dist/sweetalert.css',
    'app.scss'
  ])
    .scripts([
      './node_modules/jquery/dist/jquery.js',
      './node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
      './node_modules/toastr/build/toastr.min.js',
      './node_modules/sweetalert/dist/sweetalert.min.js',
      './node_modules/angular/angular.js',
      'app.js',
      'angular/**/*.js'
    ]);
});
