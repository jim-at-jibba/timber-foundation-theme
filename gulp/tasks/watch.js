var gulp = require('gulp');

gulp.task('watch', ['setWatch'], function() {
	gulp.watch('src/scss/**', ['styles']);
	gulp.watch('src/img/**', ['images']);
	gulp.watch('src/js/**', ['scripts']);
	// Note: The browserify task handles js recompiling with watchify
});
