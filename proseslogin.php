<?php
session_start();

$pass = $_POST["pass"];

if ($pass == "admin") {
    $_SESSION["pass"] = $pass;
    header("Location: data.php");
    die();
} else {
    header("Location: login.html");
    die();
}

?>