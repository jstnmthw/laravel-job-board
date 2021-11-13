const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss"),
    ])

if (mix.inProduction()) {
    mix.version();
}

mix.options({
    hmrOptions: {
        host: 'web',
        port: '8080',
    }
});

mix.webpackConfig(require('./webpack.config'));
mix.webpackConfig(webpack => {
    return {
        plugins: [
            new webpack.DefinePlugin({
                '__VUE_OPTIONS_API__' : true,
                '__VUE_PROD_DEVTOOLS__' : false,
            }),
            new webpack.DefinePlugin({
                // allow access to process.env from within the vue app
                'process.env': {
                    APP_URL: JSON.stringify(process.env.APP_URL)
                }
            })
        ]
    };
});
