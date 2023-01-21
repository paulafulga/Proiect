<?php
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 8){
        //connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "proiect";

        //create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //prepare and bind
        $stmt = $conn->prepare("SELECT email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);

        //set parameters and execute
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if(password_verify($password, $row['password'])) {
                //password is correct, start a new session
                session_start();
                //store email in session
                $_SESSION['email'] = $email;
                //redirect to welcome page
                header("Location: welcome.php");
                exit;
            } else {
                echo "Invalid email or password";
            }
        } else {
            echo "Invalid email or password";
        }
        $stmt->close();
        $conn->close();
    }
    else{
        //invalid email or password
        echo "Invalid email or password";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="login1.css">
</head>
<body>

<form action="index.php" method="post">
  Email:<br>
  <input type="email" name="email" required>
  <br>
  Parola:<br>
  <input type="password" name="password" required>
  <br><br>
  <input type="submit" value="Intra in cont">
</form>

<form action="signup.php" method="post">
<div style="text-align:center">
  <button style="font-size:20px" href="signup.php">Nu ai cont inca? Inregistreaza-te aici: Sign up</button>
</div>
</form>

</body>
</html>
