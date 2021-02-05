<?php 
// TemperatureConverter.php

// ************* Variables *************
$errorMsg = "";
$inputTemp = (float)"";
$userScale = "";
$endScale = "";
$newTemp = (float)"";


// ************* Error Checking *************
// Used .= to append each error to the variable, so one can see a "list" errors that apply.
// First checks if inputTemp is an empty string. If so, appends msg to errorMsg.
if(empty($_POST['inputTemp'])){
    $errorMsg .= "<p>Please enter a starting temperature.</p>";
}else{

    if (is_numeric($_POST['inputTemp']) == FALSE) {
        $errorMsg .= "<p>Only numbers are allowed. <br>Please enter a number.</p>";
    }else {
        $inputTemp = $_POST['inputTemp'];

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

// Fahrenheit converted to Celsius
if ($_POST['StartScale'] == 'StartF' && $_POST['ConvScale'] == 'ConvC') {
    $userScale = "Fahrenheit";
    $endScale = "Celsius";

    $newTemp = (($inputTemp - 32) * (5/9));

} 


// Fahrenheit converted to Kelvin
if ($_POST['StartScale'] == 'StartF' && $_POST['ConvScale'] == 'ConvK') {
    $userScale = "Fahrenheit";
    $endScale = "Kelvin";

    $newTemp = (($inputTemp - 32) * (5/9) + 273.15);

} 


// Celsius converted to Fahrenheit
if ($_POST['StartScale'] == 'StartC' && $_POST['ConvScale'] == 'ConvF') {
    $userScale = "Celsius";
    $endScale = "Fahrenheit";
    $newTemp = (($inputTemp * 9/5) + 32);
} 


// Celsius converted to Kelvin
if ($_POST['StartScale'] == 'StartC' && $_POST['ConvScale'] == 'ConvK') {
    $userScale = "Celsius";
    $endScale = "Kelvin";
    $newTemp = ($inputTemp + 273.15);  
} 


// Kelvin converted to Fahrenheit
if ($_POST['StartScale'] == 'StartK' && $_POST['ConvScale'] == 'ConvF') {
    $userScale = "Kelvin";
    $endScale = "Fahrenheit";

    $newTemp = (($inputTemp - 273.15)* (9/5) + 32);

} 


// Kelvin converted to Celsius
if ($_POST['StartScale'] == 'StartK' && $_POST['ConvScale'] == 'ConvC') {
    $userScale = "Kelvin";
    $endScale = "Celsius";
    $newTemp = ($inputTemp - 273.15);
} 

// ************* CHECK CONVERSION UNITS *************
// Checks to see if starting and conversion scale are the same. 
// *****  Not working on it's own... only displays with other errors  *****
if($_POST['StartScale'] == $_POST['ConvScale']){
    $errorMsg .= "<p>The starting and conversion scales cannot be the same.</p>";
}

// ************* test print *************
// Without a form and html, this should fire all errors every time it's ran.
if ($errorMsg != "") {
    echo $errorMsg;
    echo "<p>Please, try again.</p>";
                    }
}
?>
