<?php
session_start();

function validateNumericInput($input)
{
    if (is_numeric($input)) {
        return true;
    } else {
        return false;
    }
}

$input = $_POST['nummer'];

if (!validateNumericInput($input)) {
    $_SESSION['errors'][] = "Ongeldige numerieke waarde ingevoerd.";
}

$_SESSION['input']['nummer'] = $input;


header("Location: registreer.php");
exit();
