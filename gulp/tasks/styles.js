
var sass = require('gulp-sass');
var prefixer = require('gulp-autoprefixer');
var gulp         = require('gulp');
var notify       = require('gulp-notify');

// Where do you store your Sass files?
var sassDir = 'src/scss';

// Which directory should Sass compile to?
var targetCSSDir = 'css';

//Styles
gulp.task('styles', function(){
    return gulp.src(sassDir + '/main.scss')
        .pipe(sass({ style: 'extended' }))
        .pipe(prefixer('last 10 version'))
        .pipe(gulp.dest(targetCSSDir))
        .pipe(notify({ message: 'All done, oh great one!'}));
});
