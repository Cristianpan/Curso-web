<?php 
namespace Controllers; 
use Validator\ValidadorLogin;

class CtrlApp {
    public static function index(){
        ValidadorLogin::isAuth();
        echo "Desde dashboard";
        
    }
}