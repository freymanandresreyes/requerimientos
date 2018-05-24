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

mix.scripts([
    'resources/assets/js/global/funciones_globales.js',
    'resources/assets/js/areas/crear_area.js',
    'resources/assets/js/buscar_area_editar/editar_area.js',
    'resources/assets/js/guardar_editar_area/guardar_editar.js',
    ], 'public/js/compilados.js');
