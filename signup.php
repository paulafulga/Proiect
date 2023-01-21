<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
</head>

<body>

    <form action="signup.php" method="post">
        Prenume:<br>
        <input type="text" name="first_name" required>
        <br>
        Nume:<br>
        <input type="text" name="last_name" required>
        <br>
        Email:<br>
        <input type="email" name="email" required>
        <br>
        Parola:<br>
        <input type="password" name="password" required>
        <br><br>
        <input type="submit" value="Inregistreaza-te">
    </form>


</body>

</html>

<?php
if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 8) {
        //se conecteaza la baza de date
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "proiect";

        //creaza conexiuna
        $conn = new mysqli($servername, $username, $password, $dbname);
        //verifica conexiunea
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ////ia parametrii introdusi si ii insereaza in baza de date
        $stmt = $conn->prepare("INSERT INTO user (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("ssss", $first_name, $last_name, $email, $password);
            $stmt->execute();
            echo "Contul dumneavoastra a fost creat cu succes!";
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    } else {
        //mail sau parola invalide
        echo "Invalid email or password";
    }
    include("button.php");
}
?>