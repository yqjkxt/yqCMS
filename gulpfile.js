const elixir = require('laravel-elixir');
// var gulp = require('gulp'),
//     gulp_browserify = require('gulp-browserify');
require('laravel-elixir-vue-2');

/*http://localhost:6060/
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir((mix) => {
    // mix.sass('app.scss')
    //    .webpack('app.js');

    //加载模板js css
    mix.copy(
        'resources/assets/js/metisMenu/metisMenu.min.js','public/js/metisMenu/metisMenu.min.js'
    ).copy(
        'resources/assets/js/sb-admin-2.js','public/js/sb-admin-2.js'
    ).copy(
        'resources/assets/js/raphael/raphael.min.js','public/js/raphael/raphael.min.js'
    ).copy(
        'resources/assets/js/morrisjs/morris.min.js','public/js/morrisjs/morris.min.js'
    ).copy(
        'resources/assets/js/data/morris-data.js','public/js/data/morris-data.js'
    ).copy(
        'resources/assets/css/metisMenu/metisMenu.min.css','public/css/metisMenu/metisMenu.min.css'
    ).copy(
        'resources/assets/css/sb-admin-2.css','public/css/sb-admin-2.css'
    ).copy(
        'resources/assets/css/morrisjs/morris.css','public/css/morrisjs/morris.css'
    ).copy(
        'resources/assets/font-awesome/css/font-awesome.min.css','public/font-awesome/css/font-awesome.min.css'
    ).copy(
        'resources/assets/bootstrap/css/bootstrap.min.css','public/bootstrap/css/bootstrap.min.css'
    ).copy(
        'resources/assets/js/jquery.min.js','public/js/jquery.min.js'
    ).copy(
        'resources/assets/bootstrap/js/bootstrap.min.js','public/bootstrap/js/bootstrap.min.js'
    );

});
// gulp.task('browserify',()=>{
//    gulp.src('./resources/assets/js/*.js')
//        .pipe(gulp_browserify({
//            insertGlobals : true
//        }))
//        .pipe(gulp.dest('./public/js'));
// });
// gulp.task('default',['browserify']);




