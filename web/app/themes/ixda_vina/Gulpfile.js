;(function(){
	'use strict';
	var gulp = require('gulp'),
		sass = require('gulp-sass'),
		livereload = require('gulp-livereload'),
		// iconify = require('gulp-iconify'),
		gulpicon = require('gulpicon/tasks/gulpicon'),
		glob = require('glob'),
		sourcemaps = require('gulp-sourcemaps');

	gulp.task('sass', function(){
		return gulp.src('./style/style.scss')
			.pipe( sourcemaps.init() )
			.pipe( sass().on('error', sass.logError)  )
			.pipe( sourcemaps.write('.') )
			.pipe( gulp.dest('./style/') )
			.pipe( livereload() );
	});

	gulp.task('svgmin', function(){
		return gulp.src('./img/src/*.svg')
			.pipe(svgmin())
			.pipe(gulp.dest('./img/dist'));
	});

	var config = require('./node_modules/gulpicon/example/config.js');
	config.dest = 'img/output';
	var files = glob.sync('img/src/*.svg');

	gulp.task('icons', gulpicon(files, config));

	// gulp.task('iconify', function(){
	// 	iconify({
	// 		src           : './img/src/*.svg',
	// 		pngOutput     : './img/output/png',
	// 		scssOutput    : './style',
	// 		cssOutput     : './style',
	// 		defaultWidth  : '36px',
	// 		defaultHeight : '36px'
	// 	});
	// });

	gulp.task('sass:watch', function(){
		livereload.listen();
		gulp.watch( './style/**/*.scss', ['sass'] );
	});

	gulp.task('default', ['sass:watch']);
	gulp.task('public', ['sass:watchPublic']);
})();