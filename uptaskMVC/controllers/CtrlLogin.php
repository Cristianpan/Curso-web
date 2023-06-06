<?php 
namespace Controllers; 
class CtrlLogin {
    public static function login(){
        echo "Desde login";   

        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            
        }
    }

    public static function logout(){
        session_start(); 
        $_SESSION = []; 
        
        header("Location: /");
    }
}