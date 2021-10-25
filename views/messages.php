<?php 
session_start();

if(empty($_SESSION['messages']))
{
    return;
}

$msg = $_SESSION['messages'];
?>

