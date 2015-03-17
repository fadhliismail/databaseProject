<?php
if(isset($_SESSION['login_user'])){
    unset($_SESSION['login_user']);
   }
    echo '<h1>You have been successfully logout</h1>';
	header('Location: loginPage.php');
?>