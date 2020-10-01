const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

require('laravel-mix-svelte');

mix.disableSuccessNotifications();

mix.js('resources/src/index.js', 'resources/public/js')
    .sass('resources/src/scss/theme.scss', 'resources/public/css')
    .svelte();

mix.copyDirectory('resources/public', '../../../public/vendor/anomaly/streams/ui')

mix.options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
});

// mix.browserSync({
//     proxy: process.env.APP_URL,
//     files: [
//         'public/js/**/*.js',
//         'public/css/**/*.css',
//         'resources/views/**/*.html',
//         'resources/views/**/*.php',
//         'streams/**/*.json',
//         'streams/**/*.md'
//     ],
//     notify: false
// });


//mix.version();

// Purge css 
// if (mix.inProduction()) {
//     mix.sourceMaps().version();
// }
