var sass = require('gulp-sass');
var prefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var gulp         = require('gulp');
var notify       = require('gulp-notify');
var handleErrors = require('../util/handleErrors');

// Where do you store your Sass files?
var sassDir = 'src/scss';

// Which directory should Sass compile to?
var targetCSSDir = 'css';

//Styles
gulp.task('styles', function () {
    gulp.src(sassDir + '/main.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            style: 'compressed',
            errLogToConsole: true
        })).on('error', handleErrors)
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest(targetCSSDir));
});
