<?php   
include 'includes/header.php'; 


function miAutoLoad($clase) {
    require "models/$clase.php"; 
}
/**
 * Carga de forma automática las clases conforme las vayamos requiriendo, de acuerdo 
 * al auto loader que ha sido creado; 
 */
spl_autoload_register('miAutoLoad'); 


$cliente = new Cliente("12345", "Cristian", new Direccion("31", "87312", "México")); 
echo $cliente->getInfoCliente() . "<br>";


include 'includes/footer.php'; 
