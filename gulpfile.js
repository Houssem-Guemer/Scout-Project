import elixir from 'laravel-elixir';

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.extend('langjs', function(path) {
    gulp.task('langjs', function() {
        gulp.src('').pipe(shell('php artisan lang:js ' + (path || 'public/js/messages.js')));
    });

    return this.queueTask('langjs');
});

elixir(function(mix) {
    mix.langjs();
});