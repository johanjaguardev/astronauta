'use strict'
const { src, dest } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
function compileSass(done) {
  src('src/scss/**/*.scss')
  .pipe(sass().on('error', sass.logError))
  .pipe(dest('.'));
 done();
}
exports.compileSass = compileSass