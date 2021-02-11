let mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix
    .js('resources/lib/index.js', 'resources/public/js')
    .sass('resources/scss/variables.scss', 'resources/public/css')
    .sass('resources/scss/tailwind.scss', 'resources/public/css')
    .sass('resources/scss/theme.scss', 'resources/public/css')
    .copyDirectory('resources/public', '../../../public/vendor/streams/ui')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    })
    .webpackConfig(

        function (webpack) {

            return {
                externals: {
                    '@streams/core': ['streams', 'core'],
                    'axios': ['streams', 'core', 'axios'],
                },
                output: {
                    //path: path.resolve('./resources/public'),
                    filename: 'js/[name].js',
                    chunkFilename: 'js/chunk.[name].js',
                    library: ['streams', 'ui'],
                    publicPath: '/vendor/streams/ui/',
                    libraryTarget: 'window'
                }
            };
        })
    .sourceMaps();
