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
    host: 'akordi.local',
    open: false,
    https: true,
    port: 3002, // Change to another port for the main proxy
    ui: {
        port: 3003, // Change UI port to avoid conflicts
    },
    files: [
        'header.php',
        'single.php',
        'index.php',
        'page.php',
        'footer.php',
        'functions.php',
        'template-parts/**/*.php',
        'assets/js/**/*.js',
        'assets/styles/**/*.scss',
    ],
    watchOptions: {
        usePolling: true, // Necessary for live reload to work in Docker environments
    },
});


mix.webpackConfig({
    plugins: [
        new BrowserSyncPlugin({
            proxy: 'https://akordi.local',
            files: [
                './*.php',
                './template-parts/**/*.php',
                './assets/js/**/*.js',
                './assets/styles/**/*.scss'
            ],
            notify: false,
            open: false,
            https: true, // Ensure Browsersync is using SSL
        })
    ]
});

// Disable notifications
mix.disableNotifications();
