<?php
session_start();
unset($_SESSION["login_user"]);  // where $_SESSION["name"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: loginPage.php");

?>