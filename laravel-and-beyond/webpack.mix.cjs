const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .copy('node_modules/jquery/dist/jquery.min.js', 'public/js')
    .copy('node_modules/owl.carousel/dist/owl.carousel.min.js', 'public/js')
    .copy('node_modules/owl.carousel/dist/assets/owl.carousel.min.css', 'public/css');
    mix.sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [require('tailwindcss'), require('autoprefixer')],
    });

