const { src, dest, watch, series } = require('gulp')

const sass = require('gulp-sass')(require('sass')),
  gulp   = require('gulp'),
  jshint = require('gulp-jshint'),
  sourcemaps = require('gulp-sourcemaps'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify'),
  imagemin = require('gulp-imagemin')

// DIRECTORIES
const SASS_DIR = "src/scss/**/*.scss",
  JS_DIR = "src/js/**/*.js",
  IMG_DIR = "src/images/**/*"

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
  .pipe(jshint('.jshintrc'))
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
  .pipe(gulp.dest('.'))
  cb()
}

function watchJs() {
  watch(JS_DIR, jsHint, jsBuild);
}

function imgSquash(cb) {
  src(IMG_DIR)
  .pipe(imagemin([
    imagemin.gifsicle({interlaced: true}),
    imagemin.mozjpeg({quality: 75, progressive: true}),
    imagemin.optipng({optimizationLevel: 5}),
    imagemin.svgo({
      plugins: [
        {removeViewBox: true},
        {cleanupIDs: false}
      ]
    })
  ]))
  .pipe(gulp.dest("./images"))
  cb()
}

function watchImg() {
  watch(IMG_DIR, imgSquash);
}

exports.compileSass = compileSass
exports.jsHint = jsHint
exports.jsBuild = jsBuild
exports.imgSquash = imgSquash
exports.watchSass = watchSass
exports.watchJs = watchJs
exports.watchImg = watchImg

exports.default = () => {
  watch(SASS_DIR, series(compileSass))
  watch(JS_DIR, series(jsHint, jsBuild))
  watch(IMG_DIR, series(imgSquash))
}