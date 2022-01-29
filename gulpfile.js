const { src, dest, watch, series } = require('gulp')

const sass = require('gulp-sass')(require('sass')),
  jshint = require('gulp-jshint'),
  gulp = require('gulp'),
  sourcemaps = require('gulp-sourcemaps'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify'),
  imagemin = require('gulp-imagemin'),
  browserSync = require('browser-sync')


const server = browserSync.create()

// DIRECTORIES
const SASS_DIR = "src/scss/**/*.scss",
  JS_DIR = "src/js/**/*.js",
  IMG_DIR = "src/images/**/*",
  SITE_NAME = "meraki"


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

function reload(done) {
  server.reload()
  done()
}

exports.compileSass = compileSass
exports.jsHint = jsHint
exports.jsBuild = jsBuild
exports.imgSquash = imgSquash
exports.watchSass = watchSass
exports.watchJs = watchJs
exports.watchImg = watchImg

exports.default = () => {
  server.init({
    browser: "chrome",
    proxy: `http://localhost/${SITE_NAME}`
  })
  watch(SASS_DIR, series(compileSass,reload))
  watch(JS_DIR, series(jsHint, jsBuild, reload))
  watch(IMG_DIR, series(imgSquash, reload))
}