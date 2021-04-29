<?php session_start();

    

if (isset($_POST['submit'])) {

}
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "logixx";

        // Create connection
        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);

        }
        else {
           
            $Select = "SELECT email FROM users WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO users(firstname, lastname, email, password) values(?, ?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssss",$firstname, $lastname, $email, $password);
                if ($stmt->execute()) {
                    echo "Account created sucessfully.";
                }
            
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }

    
?>