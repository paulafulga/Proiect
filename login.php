
<?php
include("config.php");
include("navigationbar.php");
if(isset($_SESSION['email'])){
    header("Location: index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($email) || empty($password)){
        echo "Nu lasa campuri goale";
    }else{
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "proiect";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = "SELECT * FROM client WHERE email = '$email' LIMIT 1";
         $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result,MYSQLI_ASSOC);
  
        $count = mysqli_num_rows($result);
  
  // If result matched $myusername and $mypassword, table row must be 1 row
    
  if($count == 1) {
     $_SESSION['login_user'] = $email;
        $_SESSION['login_user'] = $password;
     header("location: indexAfter.php");
  }else {
     $error = "Your Login Name or Password is invalid";
     echo "Email/parola incorecta";
  }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>

<form action="login.php" method="post">
  Email:<br>
  <input type="email" name="email" required>
  <br>
  Password:<br>
  <input type="password" name="password" required>
  <br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
