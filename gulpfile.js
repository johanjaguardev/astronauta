const { src, dest, watch } = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const SASS_DIR = "src/scss/**/*.scss"
function compileSass(done) {
  src(SASS_DIR)
  .pipe(sass().on('error', sass.logError))
  .pipe(dest('.'))
 done()
}
function watchSass() {
  watch(SASS_DIR, compileSass);
}


exports.compileSass = compileSass
exports.watchSass = watchSass