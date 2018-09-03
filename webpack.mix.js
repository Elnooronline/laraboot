const mix = require('laravel-mix');

require('dotenv').config({
    path: '../../.env'
});

let resourceRoot = process.env.MIX_ADMINLTE_RESOURCE_ROOT || '/vendor/adminlte/';

const WebpackRTLPlugin = require('webpack-rtl-plugin');

mix.setPublicPath('./public');

mix.js('resources/assets/js/auth.js', 'public/js')
    .js('resources/assets/js/admin-lte.js', 'public/js')
    .js('resources/assets/js/laravel-adminlte.js', 'public/js')
    .extract([
      'lodash',
      'jquery',
      'bootstrap-sass',
      'fastclick',
      'jquery-slimscroll',
      'admin-lte',
      'sweetalert2',
    ], 'public/js/vendor.js')
    .autoload({
      jquery: ['$', 'jQuery', 'jquery', 'Vue'],
    });

mix.sass('resources/assets/sass/auth.scss', 'public/css')
    .sass('resources/assets/sass/admin-lte.scss', 'public/css')
    .options({
        processCssUrls: true,
        imgLoaderOptions: {
            enabled: false,
        },
        resourceRoot
    });

mix.webpackConfig({
  plugins: [
    new WebpackRTLPlugin(),
  ],
});
if (mix.inProduction()) {
    mix.version();
}
