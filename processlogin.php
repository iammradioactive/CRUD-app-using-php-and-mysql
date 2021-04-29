<?php session_start();

include_once("config.php");

if ( !isset($_POST['email'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

if ($stmt = $conn->prepare('SELECT email, password FROM users WHERE email = ?')) {
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($email, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        
        if ($_POST['password'] === $password) {
            
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            header("Location: dashboard.php");
                die();
        } else {
            // Incorrect password
            echo 'Incorrect email and/or password!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect email and/or password!';
    }

	$stmt->close();
}
?>

