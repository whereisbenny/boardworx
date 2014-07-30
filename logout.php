<?php

session_start();

unset($_SESSION["customerid"]);
unset($_SESSION["firstname"]);
unset($_SESSION["Cart"]);
unset($_SESSION["admin"]);
header("Location: index.php");


?>