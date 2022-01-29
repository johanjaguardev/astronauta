const { src, dest, watch } = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const gulp   = require('gulp')
const jshint = require('gulp-jshint')
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



exports.compileSass = compileSass
exports.watchSass = watchSass
exports.jsHint = jsHint