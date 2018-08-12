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

const CleanWebpackPlugin = require('clean-webpack-plugin');

mix.webpackConfig({
  plugins: [
    new CleanWebpackPlugin(['public/dist'])
  ]
});

mix.js('resources/assets/js/app.js', 'public/dist/js')
   .sass('resources/assets/sass/app.scss', 'public/dist/css');

mix.js('resources/assets/js/components/productos-index/app.js', 'public/dist/js/productos-index.js');
mix.js('resources/assets/js/components/user/productos/app.js', 'public/dist/js/user/productos.js');
mix.js('resources/assets/js/components/user/comentarios/app.js', 'public/dist/js/user/comentarios.js');
