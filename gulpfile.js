const gulp = require('gulp')
const plumber = require('gulp-plumber')
const sass = require('gulp-sass')(require('sass'))
const postcss = require('gulp-postcss')
const autoprefixer = require('autoprefixer')
const sourcemaps = require('gulp-sourcemaps')
const groupmq = require('gulp-group-css-media-queries')
const bs = require('browser-sync')

const SASS_SOURCES = [
  '**/*.scss', // All other Sass files in the /css directory
];

gulp.task('compile:sass', () =>
  gulp.src(SASS_SOURCES, { base: 'src/scss' })
    .pipe(plumber()) // Prevent termination on error
    .pipe(sass({
      indentType: 'tab',
      indentWidth: 1,
      outputStyle: 'expanded', // Expanded so that our CSS is readable
    })).on('error', sass.logError)
    .pipe(postcss([
      autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false,
      })
    ]))
    .pipe(groupmq()) // Group media queries!
    .pipe(gulp.dest('.')) // Output compiled files in the same dir as Sass sources
    .pipe(bs.stream())); // Stream to browserSync