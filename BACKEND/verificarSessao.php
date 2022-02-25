<?php

if(!isset($_SESSION)) session_start();

if(!isset($_SESSION["loguin_email"])){
    session_start();
    header('Location: loguin_senha.php');
}

?>