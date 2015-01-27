var changed    = require('gulp-changed');
var gulp       = require('gulp');
var imagemin   = require('gulp-imagemin');
var notify     = require('gulp-notify');

gulp.task('images', function() {
	var dest = 'img'; // Image Destination

	return gulp.src('./src/img/**')
		.pipe(changed(dest)) // Ignore unchanged files
		.pipe(imagemin()) // Optimize
        .pipe(notify({
                title: 'Success',
                message: 'Your styles have compiled successfully'
            }))
		.pipe(gulp.dest(dest));

});
