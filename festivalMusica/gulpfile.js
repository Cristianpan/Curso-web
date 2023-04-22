const { src, dest, watch } = require("gulp");
const sass = require("gulp-sass")(require('sass'));

function css(done) {
  src("./src/scss/app.scss")  // Identificar el archivo de SASS
  .pipe(sass())  // Compilarlo
  .pipe(dest("css")); // Almacenarla en el disco duro

  done(); //call back que avisa a gulp cuando se llega al final
}

function dev(done) {
    watch("./src/scss/app.scss", css); 
    done();
}

exports.css = dev;
