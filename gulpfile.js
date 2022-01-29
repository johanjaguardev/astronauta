const { src, dest, watch } = require('gulp')

const sass = require('gulp-sass')(require('sass')),
  gulp   = require('gulp'),
  jshint = require('gulp-jshint'),
  sourcemaps = require('gulp-sourcemaps'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify')

// DIRECTORIES
const SASS_DIR = "src/scss/**/*.scss"
const JS_DIR = "src/js/**/*.js"
function compileSass(done) {
  src(SASS_DIR)
  .pipe(sass().on('error', sass.logError))
  .pipe(dest('.'))
 done()
}
function watchSass() {
  watch(SASS_DIR, compileSass);
}

function jsHint(cb) {
  src(JS_DIR)
  .pipe(jshint())
  .pipe(jshint.reporter('jshint-stylish'))
  cb()
}

function jsBuild(cb) {
  src(JS_DIR)
  .pipe(sourcemaps.init())
  .pipe(concat('bundle.js'))
  //only uglify if gulp is ran with '--type production'
  .pipe(uglify())
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('public/assets/javascript'))
  cb()
}

function watchJs() {
  watch(JS_DIR, jsHint);
}



exports.compileSass = compileSass
exports.watchSass = watchSass
exports.jsHint = jsHint
exports.jsBuild = jsBuild
exports.watchJs = watchJs