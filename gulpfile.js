var elixir = require('laravel-elixir');
require('laravel-elixir-wiredep');
require('laravel-elixir-useref');

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
    mix
      .wiredep({
        baseDir: 'resources/views/frontend',
        src: 'layout.blade.php'
      })
      .useref({
        baseDir: 'resources/views/frontend',
        src: 'layout.blade.php'
      });
});

//elixir(function(mix) {
// mix.scripts(['app.js'], 'public/js/app.js')
//   .scripts([
//    '../vendor/ace-1.2.0/src/ace.js',
//    '../vendor/ace-1.2.0/src/mode-php.js',
//    '../vendor/ace-1.2.0/src/worker-php.js'
//   ], 'public/js/vendor.js');
//});