<?php 
// index.php

// ************* Variables *************
$errorMsg = "";
$userTemp = (float)"";
$userScale = "";
$endScale = "";
$newTemp = (float)"";


// ************* Error Checking *************
// Used .= to append each error to the variable, so one can see a "list" errors that apply.
// First checks if userTemp is an empty string. If so, appends msg to errorMsg.
if(empty($_POST['userTemp'])){
    $errorMsg .= "<p>Please enter a starting temperature.</p>";
}else{
    if(is_numeric($_POST['userTemp']) == FALSE) {
        $errorMsg .= "<p>Only numbers are allowed. <br>Please enter a number.</p>";
    }else{
        $userTemp = $_POST['userTemp'];
    }
}

// ************* CHECK ISSET *************
// Checks if StartScale has been set. If not, appends msg to errorMsg.
if(isset($_POST['StartScale'])){
    $StartScale = $_POST['StartScale'];
}else{
    $errorMsg .= "<p>Please select the initial scale.</p>";
}
// Checks if ConvScale has been set. If not, appends msg to errorMsg.
if(isset($_POST['ConvScale'])){
    $ConvScale = $_POST['ConvScale']; 
}else{
    $errorMsg .= "<p>Please choose the conversion scale.</p>";
}


// ************* CONVERSIONS *************
// Fahrenheit to Celsius
if ($_POST['StartScale'] == 'StartF' && $_POST['ConvScale'] == 'ConvC') {
    $userScale = "Fahrenheit";
    $endScale = "Celsius";
    $newTemp = (($userTemp - 32) * (5/9));
} 


// Fahrenheit to Kelvin
if ($_POST['StartScale'] == 'StartF' && $_POST['ConvScale'] == 'ConvK') {
    $userScale = "Fahrenheit";
    $endScale = "Kelvin";
    $newTemp = (($userTemp - 32) * (5/9) + 273.15);
} 


// Celsius to Fahrenheit
if ($_POST['StartScale'] == 'StartC' && $_POST['ConvScale'] == 'ConvF') {
    $userScale = "Celsius";
    $endScale = "Fahrenheit";
    $newTemp = (($userTemp * 9/5) + 32);
} 


// Celsius to Kelvin
if ($_POST['StartScale'] == 'StartC' && $_POST['ConvScale'] == 'ConvK') {
    $userScale = "Celsius";
    $endScale = "Kelvin";
    $newTemp = ($userTemp + 273.15);  
} 


// Kelvin to Fahrenheit
if ($_POST['StartScale'] == 'StartK' && $_POST['ConvScale'] == 'ConvF') {
    $userScale = "Kelvin";
    $endScale = "Fahrenheit";
    $newTemp = (($userTemp - 273.15) * (9/5) + 32);
} 


// Kelvin to Celsius
if ($_POST['StartScale'] == 'StartK' && $_POST['ConvScale'] == 'ConvC') {
    $userScale = "Kelvin";
    $endScale = "Celsius";
    $newTemp = ($userTemp - 273.15);
} 

// ************* CHECK CONVERSION UNITS *************
// Checks to see if starting and conversion scale are the same. 
// *****  Not working on it's own... only displays with other errors  *****
if($_POST['StartScale'] == $_POST['ConvScale']){
    $errorMsg .= "<p>The starting and conversion scales cannot be the same.</p>";
}
?>
