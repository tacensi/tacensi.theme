const gulp = require("gulp"),
	  sass = require("gulp-sass"),
	  concat = require("gulp-concat"),
	  uglify = require("gulp-uglify"),
	  imagemin = require("gulp-imagemin"),
	  postcss = require("gulp-postcss"),
	  cssnano = require("cssnano"),
	  autoprefixer = require("autoprefixer"),
	  sourcemaps = require("gulp-sourcemaps"),
	  browserSync = require("browser-sync").create();

var paths = {
	styles: {
		src: "./src/scss/**/*.scss",
		dest: "./css"
	},
	scripts: {
		src: "./src/js/**/*",
		dest: "./js"
	},
	imgs: {
		src: "./src/imgs/**/*",
		dest: "./img"
	},
};

function style() {
	return gulp
		.src(paths.styles.src)
		.pipe(sourcemaps.init())
		.pipe(sass())
		.on("error", sass.logError)
		.pipe(postcss([
			cssnano(),
			require('postcss-font-magician')({
				display: 'swap',
				protocol: 'https:'
			}),
			require("css-mqpacker")(),
			autoprefixer()
		]))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(paths.styles.dest))
		.pipe(browserSync.stream());
}

function scripts() {
	console.log(paths.scripts.dest);
	return gulp
		.src(paths.scripts.src)
		.pipe(sourcemaps.init())
		.pipe(concat('main.js'))
		.pipe(uglify())
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(paths.scripts.dest))
		.pipe(browserSync.stream())
}

function imgs (done) {
	gulp.src(paths.imgs.src)
		.pipe(imagemin([
			imagemin.gifsicle({interlaced: true}),
			imagemin.jpegtran({progressive: true}),
			imagemin.optipng({optimizationLevel: 5}),
			imagemin.svgo({
				plugins: [
					{removeViewBox: true},
					{cleanupIDs: false},
				]
			})
		],
		{
			verbose: true
		}))
		.pipe(gulp.dest(paths.imgs.dest));
	done();
}

// A simple task to reload the page
function reload() {
	browserSync.reload();
}

// Add browsersync initialization at the start of the watch task
function watch() {
	browserSync.init({
		proxy: "tacensi.foobar"
	});
	gulp.watch(paths.styles.src, style);
	gulp.watch(paths.scripts.src, scripts);
	gulp.watch("./*.html", reload);
}
// Don't forget to expose the task!
exports.watch = watch
exports.style = style;
exports.scripts = scripts;
exports.imgs = imgs;

/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
var build = gulp.parallel(style, scripts, watch);

/*
 * You can still use `gulp.task` to expose tasks
 */
gulp.task('build', build);

/*
 * Define default task that can be called by just running `gulp` from cli
 */
gulp.task('default', build);

gulp.task('imgs', imgs);
