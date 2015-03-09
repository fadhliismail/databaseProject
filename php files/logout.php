<?php
session_start();
session_destroy();
header('Location: index.php'); // need to redirect to login page. index.php right now is the homepage.
?>