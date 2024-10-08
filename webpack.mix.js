const mix = require('laravel-mix');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

// Compile Tailwind, JS, and CSS with Mix
mix.js('assets/scripts/scripts.js', 'js')
    .sass('assets/styles/style.scss', 'style.css')
    .options({
        processCssUrls: false,
        postCss: [require('tailwindcss')],
    })
    .sourceMaps();

// Enable Browsersync for live reload
mix.browserSync({
    proxy: 'https://akordi.local',
    // host: '127.0.0.1',
    open: false,
    https: true,
    port: 3002,
    ui: {
        port: 3003,
    },
    files: [
        'header.php',
        'single.php',
        'index.php',
        'page.php',
        'front-page.php',
        'footer.php',
        'functions.php',
        'template-parts/**/*.php',
        'assets/js/**/*.js',
        'assets/styles/**/*.scss',
    ],
});


// mix.webpackConfig({
//     plugins: [
//         new BrowserSyncPlugin({
//             proxy: 'https://akordi.local',
//             files: [
//                 './*.php',
//                 './template-parts/**/*.php',
//                 './assets/js/**/*.js',
//                 './assets/styles/**/*.scss'
//             ],
//             notify: false,
//             open: false,
//             https: true, // Ensure Browsersync is using SSL
//         })
//     ]
// });

// Disable notifications
mix.disableNotifications();
