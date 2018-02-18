var args            = require('yargs').argv;
var autoprefixer    = require('gulp-autoprefixer');
var babel           = require('gulp-babel');
var browserSync     = require('browser-sync').create();
var bump            = require('gulp-bump');
var cache           = require('gulp-cache');
var checktextdomain = require('gulp-checktextdomain');
var concat          = require('gulp-concat');
var cssnano         = require('gulp-cssnano');
var file            = require('gulp-file');
var gulp            = require('gulp');
var gulpif          = require('gulp-if');
var imagemin        = require('gulp-imagemin');
var jshint          = require('gulp-jshint');
var mergeStream     = require('merge-stream');
var modernizr       = require('modernizr');
var moduleImporter  = require('sass-module-importer');
var potomo          = require('gulp-potomo');
var pseudo          = require('gulp-pseudo-i18n');
var pump            = require('pump');
var rename          = require('gulp-rename');
var runSequence     = require('run-sequence');
var sass            = require('gulp-sass');
var sort            = require('gulp-sort');
var uglify          = require('gulp-uglify');
var wpPot           = require('gulp-wp-pot');
var yaml            = require('yamljs');

var config = yaml.load('+/config.yml');

/* Modernizr Task
 -------------------------------------------------- */
gulp.task('modernizr', function(done) {
	modernizr.build(config.modernizr, function(code) {
		pump([
			file('modernizr.js', code, {src: true}),
			uglify(),
			gulp.dest(config.dest.js),
		]);
	});
});

/* JSHint Task
 -------------------------------------------------- */
gulp.task('jshint', function()
{
	pump([
		gulp.src(config.watch.js),
		jshint(),
		jshint.reporter('jshint-stylish'),
		jshint.reporter('fail'),
	]);
});

/* JS Task
 -------------------------------------------------- */
gulp.task('js', function() {
	var streams = mergeStream();
	for(var key in config.scripts) {
		streams.add(gulp.src(config.scripts[key]).pipe(concat(key)));
	}
	pump([
		streams,
		// babel({presets: ["env"]})
		gulpif(args.production, uglify({
			output: {comments: 'some'},
		})),
		gulp.dest(config.dest.js),
		browserSync.stream(),
	]);
});

/* CSS Task
 -------------------------------------------------- */
gulp.task('css', function() {
	pump([
		gulp.src(config.watch.scss),
		sass({
			importer: moduleImporter(),
			outputStyle: 'expanded',
		}).on('error', sass.logError),
		autoprefixer('last 2 versions'),
		gulpif(args.production, cssnano({
			minifyFontValues: false,
			discardComments: { removeAll: true }
		})),
		gulp.dest(config.dest.css),
		browserSync.stream(),
	]);
});

/* Images Task
 -------------------------------------------------- */
gulp.task('images', function() {
	pump([
		gulp.src(config.watch.img),
		cache(imagemin({
			optimizationLevel: 3,
			progressive: true,
			interlaced: true,
		})),
		gulp.dest(config.dest.img),
	]);
});

/* Language Tasks
 -------------------------------------------------- */
gulp.task('languages', function() {
	return runSequence('po', 'mo')
});

gulp.task('po', function() {
	pump([
		gulp.src(config.watch.php),
		checktextdomain({
			text_domain: config.language.domain,
			keywords: [
				'__:1,2d',
				'_e:1,2d',
				'_x:1,2c,3d',
				'esc_html__:1,2d',
				'esc_html_e:1,2d',
				'esc_html_x:1,2c,3d',
				'esc_attr__:1,2d',
				'esc_attr_e:1,2d',
				'esc_attr_x:1,2c,3d',
				'_ex:1,2c,3d',
				'_n:1,2,4d',
				'_nx:1,2,4c,5d',
				'_n_noop:1,2,3d',
				'_nx_noop:1,2,3c,4d',
			],
		}),
		sort(),
		wpPot({
			domain: config.language.domain,
			lastTranslator: config.language.translator,
			team: config.language.team,
		}),
		pseudo({
			charMap: {},
		}),
		rename(config.language.domain + '-en_US.po'),
		gulp.dest(config.dest.lang),
	]);
});

gulp.task('mo', function() {
	pump([
		gulp.src(config.dest.lang + '*.po'),
		potomo(),
		gulp.dest(config.dest.lang),
	]);
});

/* Version Task
 -------------------------------------------------- */
gulp.task('bump', function() {
	pump([
		gulp.src('style.css'),
		gulpif(args.patch || Object.keys(args).length < 3, bump({type: 'patch'})),
		gulpif(args.minor, bump({type: 'minor'})),
		gulpif(args.major, bump({type: 'major'})),
		gulp.dest('.'),
	]);
});

/* Watch Task
 -------------------------------------------------- */
gulp.task('watch', function() {
	browserSync.init({
		proxy: config.browsersync.proxy,
		notify: {
			styles: [
				'display: none',
				'position: fixed',
				'right: 0px',
				'bottom: 0px',
				'font-family: sans-serif',
				'font-size: 0.9em',
				'color: white',
				'text-align: center',
				'border-top-left-radius: 5px',
				'background-color: #1B2032',
				'padding: 15px',
				'margin: 0',
				'z-index: 9999',
			],
		},
	});
	gulp.watch(config.watch.js, ['jshint', 'js']);
	gulp.watch(config.watch.scss, ['css']);
	gulp.watch(config.watch.php).on('change', browserSync.reload);
});

/* Default Task
 -------------------------------------------------- */
gulp.task('default', function() {
	gulp.start('css', 'jshint', 'js')
});

/* Build Task
 -------------------------------------------------- */
gulp.task('build', function() {
	gulp.start('css', 'jshint', 'js', 'modernizr', 'images', 'languages')
});
