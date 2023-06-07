<?php 
namespace Validator; 

class ValidatorLogin {
    public static function isAuth() : void {
        if(!isset($_SESSION['login'])) {
            header('Location: /');
        }
    }
}