// webpack.mix.js

let mix = require('laravel-mix');
require('laravel-mix-purgecss');
const tailwindcss = require('tailwindcss');

// Config

mix.webpackConfig({
    stats: {
        children: true
    }
});

// CSS

mix.
    sass('assets/styles/style.scss', 'style.css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],

    })


// JS
mix
    .js([
        'assets/scripts/scripts.js'
    ], 'js/scripts.min.js');