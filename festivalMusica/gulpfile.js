const { src, dest, watch, parallel } = require("gulp");

//CSS
const sass = require("gulp-sass")(require('sass'));
const plumber = require('gulp-plumber'); 
//Imagenes
const avif = require('gulp-avif'); 
const cache = require('gulp-cache'); 
const imageMin = require('gulp-imagemin'); 
const webp = require('gulp-webp'); 


function css(done) {
  src("./src/scss/**/*.scss")  // Identificar el archivo de SASS
  .pipe(plumber())
  .pipe(sass())  // Compilarlo
  .pipe(dest("css")); // Almacenarla en el disco duro

  done(); //call back que avisa a gulp cuando se llega al final
}

function versionAvif(done) {
  const options = {
    quality: 50
  }; 
  src('src/img/**/*.{png,jpg}')
  .pipe(avif(options))
  .pipe(dest('img'))
  done(); 
}
function versionWebp(done) {
  const options = {
    quality: 50
  }; 
  src('src/img/**/*.{png,jpg}')
  .pipe(webp(options))
  .pipe(dest('img'))
  done(); 
}

function image (done) {
  const options = {
    optmizitationLevel: 3
  }; 
  src('src/img/**/*.{png,jpg}')
  .pipe(cache(imageMin(options)))
  .pipe(dest('img'))
  done(); 
}


function dev(done) {
    watch("./src/scss/**/*.scss", css); 
    done();
}
exports.versionAvif = versionAvif; 
exports.image = image; 
exports.versionWebp = versionWebp; 
exports.css = parallel(image, versionWebp, versionAvif, dev);
