<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
?>

<h3>Dashboard</h3>
Welcome !!! <br><br>

<a href="courses.php">Courses</a>
<a href="logout.php">Logout</a>
<a href="reset.php">Reset Password</a>