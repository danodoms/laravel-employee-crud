let mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .options({
        processCssUrls: false,
        postCss: [require("autoprefixer")],
    })
    .webpackConfig({
        target: "web",
    })
    .browserSync({
        proxy: "http://127.0.0.1:8000",
        files: [
            "resources/views/**/*.blade.php",
            "public/js/**/*.js",
            "public/css/**/*.css",
            // Add other file types as needed
        ],
    })
    .version();
