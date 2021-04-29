

<form method="POST" action="processregister.php">
<p>
    <label for="">First Name</label><br>
    <input
    <?php
        if (isset($_SESSION['firstname'])){
            echo "value=" . $_SESSION['firstname'];
        }
    ?>
     name="firstname" type="text" placeholder="First Name" required>
</p>
<p>
    <label for="">Last Name</label><br>
    <input
    <?php
        if (isset($_SESSION['lastname'])){
            echo "value=" . $_SESSION['lastname'];
        }
    ?>
     name="lastname" type="text" placeholder="Last Name" required>
</p>
<p>
    <label for="">Email Address</label><br>
    <input
    <?php
        if (isset($_SESSION['email'])){
            echo "value=" . $_SESSION['email'];
        }
    ?>
     name="email" type="email" placeholder="Email Address" required>
</p>
<p>
    <label for="">Password</label><br>
    <input name="password" type="password" placeholder="Password" required>
</p>     
<p>
    <button type="submit">Register</button> 
</p>  
<p>Already have an account? <a href="login.php">Login here</a>.</p>           
</body>
</html>
    