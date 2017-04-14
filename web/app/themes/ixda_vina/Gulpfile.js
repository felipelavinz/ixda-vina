;(function(){
	'use strict';
	var gulp = require('gulp'),
		sass = require('gulp-sass'),
		livereload = require('gulp-livereload'),
		svgmin = require('gulp-svgmin'),
		sourcemaps = require('gulp-sourcemaps');

	gulp.task('sass', function(){
		return gulp.src('./style/style.scss')
			.pipe( sourcemaps.init() )
			.pipe( sass().on('error', sass.logError)  )
			.pipe( sourcemaps.write('./style/') )
			.pipe( gulp.dest('./style/') )
			.pipe( livereload() );
	});

	gulp.task('svgmin', function(){
		return gulp.src('./img/src/*.svg')
			.pipe(svgmin())
			.pipe(gulp.dest('./img/dist'));
	})

	gulp.task('sass:watch', function(){
		livereload.listen();
		gulp.watch( './style/**/*.scss', ['sass'] );
	});

	gulp.task('default', ['sass:watch']);
	gulp.task('public', ['sass:watchPublic']);
})();