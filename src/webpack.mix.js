const mix = require('laravel-mix');

mix.version();

if (mix.inProduction()) {
    mix.sourceMaps();
}

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
