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

//mix.js('resources/assets/js/app.js', 'public/js')
//   .sass('resources/assets/sass/app.scss', 'public/css');

mix.combine(['resources/assets/bootstrap/popper.min.js','resources/assets/bootstrap/bootstrap.min.js'],'public/js/app.js')
    .sass('resources/assets/sass/app.scss', 'resources/assets/sass')
    .styles(['resources/assets/bootstrap/bootstrap.min.css','public/resources/assets/sass/app.css'],'public/css/app.css');
//concatenating
/*
mix.styles([
    'public/css/vendor/normalize.css',
    'public/css/vendor/videojs.css'
], 'public/css/all.css');
*/