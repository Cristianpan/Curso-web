const { src, dest, watch, parallel } = require("gulp");

//CSS
const sass = require("gulp-sass")(require("sass"));
const plumber = require("gulp-plumber");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const postcss = require("gulp-postcss");
const sourcemaps = require("gulp-sourcemaps");
//Imagenes
const avif = require("gulp-avif");
const cache = require("gulp-cache");
const imageMin = require("gulp-imagemin");
const webp = require("gulp-webp");
const terser = require("gulp-terser");

function css(done) {
  src("src/scss/**/*.scss") //Identificar el archivo SASS
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(sass()) //Compilarlo
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(sourcemaps.write("."))
    .pipe(dest("css")); //Almacenarlo en el disco duro
  done(); //Callback que avisa a gulp cuando llegamos al final
}

function versionAvif(done) {
  const options = {
    quality: 50,
  };
  src("src/img/**/*.{png,jpg}").pipe(avif(options)).pipe(dest("img"));
  done();
}
function versionWebp(done) {
  const options = {
    quality: 50,
  };
  src("src/img/**/*.{png,jpg}").pipe(webp(options)).pipe(dest("img"));
  done();
}

function image(done) {
  const options = {
    optmizitationLevel: 3,
  };
  src("src/img/**/*.{png,jpg}")
    .pipe(cache(imageMin(options)))
    .pipe(dest("img"));
  done();
}

function javascript(done) {
  src("./src/js/**/*.js")
    .pipe(sourcemaps.init())
    .pipe(terser())
    .pipe(sourcemaps.write("."))
    .pipe(dest("js"));

  done();
}

function dev(done) {
  watch("src/scss/**/*.scss", css);
  watch("src/js/**/*.js", javascript);
  done();
}
exports.versionAvif = versionAvif;
exports.image = image;
exports.versionWebp = versionWebp;
exports.css = parallel(javascript, dev);
