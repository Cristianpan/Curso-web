<?php include 'includes/header.php'; 

$num1 = 20;
$num2 = 30;
$num3 = 40;
$num4 = "30"; 

var_dump($num1 < $num2); 
echo "<br/>"; 
var_dump($num1 > $num2); 
echo "<br/>"; 
var_dump($num1 <= $num2); 
echo "<br/>"; 

//Comparador estricto
var_dump($num4 === $num2); 
echo "<br/>";


/**
 * x <=> y
 * retorna -1 si x < y
 * retorna 1 si x > y
 * retorna 0 si x = y
 */
var_dump($num2 <=> $num2); 
echo "<br/>"; 
include 'includes/footer.php'; 