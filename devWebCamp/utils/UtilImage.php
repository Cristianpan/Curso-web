<?php 
namespace Util; 
use Intervention\Image\ImageManagerStatic as Image;

class UtilImage {
    public static function crearCarpeta($path){
        if (!is_dir($path)) {
            mkdir($path); 
            chmod($path, 0777); 
        }
    }

    public static function guardarImagen($imagen, $nombreImagen, $carpeta){
        $imagenPng = Image::make($imagen)->fit(800, 800)->encode('png', 80);
        $imagenWebp = Image::make($imagen)->fit(800, 800)->encode('webp', 80);

        $imagenPng->save($carpeta . $nombreImagen . '.png');
        $imagenWebp->save($carpeta . $nombreImagen . '.webp');
    }

    public static function eliminarImagen($path){
        if (file_exists($path . ".png")){
            unlink($path . ".png");
        } 
        if (file_exists($path . ".webp")){
            unlink($path . ".webp");
        }
    }
}