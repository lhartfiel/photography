//Include gulp and plugins
var gulp = require('gulp'),
		sass = require('gulp-sass'),
		autoprefixer = require('gulp-autoprefixer'),
		minifycss = require('gulp-minify-css'),
		uglify = require('gulp-uglify'),
		imagemin = require('gulp-imagemin'),
		rename = require('gulp-rename'),
		notify = require('gulp-notify'),
		cache = require('gulp-cache'),
		livereload = require('gulp-livereload'),
		newer = require('gulp-newer'),
		plumber = require('gulp-plumber');
		node = require('node-neat');
		bourbon = require('node-bourbon');

//Create tasks

//Minify images
gulp.task('images', function(){
	return gulp.src('app/img/**/*.{png, jpg, gif}')
		.pipe(newer('build/img'))
		.pipe(cache(imagemin({ 
			optimizationLevel: 5, 
			progressive: true, 
			interlaced: true 
		})))
		.pipe(gulp.dest('build/img'))
		.pipe(notify({message: 'Images task complete!' }));
});

//Compile SCSS and minify CSS
gulp.task('styles', function(){
	return gulp.src('app/scss/**/*.scss')
	.pipe(plumber({
		handleError: function (err) {
        console.log(err);
        this.emit('end');
    }
	}))
	.pipe(sass({
		style: 'expanded',
		includePaths: require('node-neat').includePaths
	}))
	.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
	.pipe(gulp.dest('build/css'))
	.pipe(rename({suffix: '.min'}))
	.pipe(minifycss())
	.pipe(gulp.dest('build/css'))
	.pipe(notify({message: 'Styles task complete!'}))
});

//Minify JS
gulp.task('scripts', function(){
	return gulp.src('app/js/**/*.js')
		.pipe(plumber({
			handleError: function (err) {
	        console.log(err);
	        this.emit('end');
	    }
	  }))  
		.pipe(gulp.dest('build/js'))
		// .pipe(rename({suffix: '.min'}))
		// .pipe(uglify())
		// .pipe(gulp.dest('build/js'))
		.pipe(notify({ message: "Scripts task complete!" }));
});


//Setup Watch Task
gulp.task('watch', function(){
	//Watch Images
	gulp.watch('app/img/**/*', ['images']);

	//Watch SCSS
	gulp.watch('app/scss/**/*.scss', ['styles']);

	//Watch JS
	gulp.watch('app/js/**/*.js', ['scripts']);

	//Create LiveReload server
	livereload.listen();

	//Watch any files in the build folder and reload on change
	gulp.watch('build/**').on('change', livereload.changed);
});