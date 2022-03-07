const mix = require('laravel-mix');

mix.version();

if (mix.inProduction()) {
    mix.sourceMaps();
}

mix.sass('resources/sass/app.scss', 'public/css/app.css');

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
