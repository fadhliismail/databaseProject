<?php
session_start();

require_once('db_connect.php');

// check if data was submitted, isset will check if the data exists.
if ( !isset($_POST['StudentId'], $_POST['User_pass']) ) {
    // Could not get the data that should have been sent.
    die ('Username and/or password does not exist!');
} 

// Prepare SQL 
if ($stmt = $conn->prepare('SELECT StudentNo, User_pass FROM student WHERE StudentId = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
    $stmt->bind_param('s', $_POST['StudentId']);
    $stmt->execute(); 
    $stmt->store_result(); 
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($StudentNo, $User_pass);
        $stmt->fetch();      
        // Account exists, verify the password.
        if (password_verify($_POST['User_pass'], $User_pass)) {
            // Verification success! User has loggedin!
                        $_SESSION['loggedin'] = TRUE;
						$_SESSION['name'] = $_POST['username'];
						$_SESSION['id'] = $id;
						header('Location: index.php');
        } else {
            echo 'Incorrect username and/or password!1';
        }
    } else {
        echo 'Incorrect username and/or password!2';
    }
    $stmt->close();
} else {
    echo 'Could not prepare statement!';
}
?>