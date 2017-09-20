let mix = require('laravel-mix');

mix.webpackConfig({
    module: {
/*        
		rules: [
            {
                test: /\.css$/,
                loader: "style-loader!css-loader"
            },
        ],
*/
    }
});

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

mix.js('resources/assets/js/app-accueil.js', 'public/js')
		.js('resources/assets/js/app-galeries.js', 'public/js')
		.js('resources/assets/js/app-expositions.js', 'public/js')
		.js('resources/assets/js/app-administration.js', 'public/js')
		.sass('resources/assets/sass/app.scss', 'public/css');
