<?php
   session_start();
   session_destroy();
   header('Location: loguin_senha.php');
?>