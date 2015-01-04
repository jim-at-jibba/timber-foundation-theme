var concat = require('gulp-concat');
var stripDebug = require('gulp-strip-debug');
var uglify = require('gulp-uglify');
var gulp = require('gulp');

// Where do you store your Bower files?
var bowerDir = 'bower_components';

// Where do you store your JS files?
var jsDir = 'src/js';

// Which directory should Sass compile to?
var targetjsDir = 'js';

// JS concat, strip debugging and minify
    gulp.task('scripts', function () {
        gulp.src([
                bowerDir + '/foundation/js/foundation.min.js',
                bowerDir + '/slick-carousel/slick/slick.min.js',
                bowerDir + '/lightbox2/js/lightbox.min.js',
                jsDir + '/app.js'
            ])
            .pipe(concat('script.js'))
            //.pipe(stripDebug())
            //.pipe(uglify())
            .pipe(gulp.dest(targetjsDir));
    });