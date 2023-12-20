<?php
// get the input from the user and store it in variables
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pass_word = $_POST["password"];
    $repeat_password = $_POST["password1"];

    echo "Username: " . $username . "Email: " . $email . "password: " . $pass_word . "<br>";

    // connecting to the server 
    $servername = "localhost";
    $usernamemysql = "root";
    $password = "";
    $dbname = "inscrire";
    $conn = mysqli_connect($servername, $usernamemysql, $password, $dbname);
}
if (!$conn) {
    echo "connexion impossible <br>";
} else {
    echo "connexion reussie <br>";
}

// Hash the password
$hashed_password = password_hash($pass_word, PASSWORD_DEFAULT);

// Store $hashed_password in the database
// insert the user input to the dataBase



//ensure that it's working
// echo ($sql);

//ensure that the passwords are marching
if ($pass_word !== $repeat_password) {
    // if they don't match
    echo "Passwords do not match!";
} else {

    // if they're matching it'll redirect the user to the workspace.php
    $sql = "INSERT INTO users values ('', '$username', '$email', '$hashed_password')";

    header("Location: workspace.php");
    exit;                              // it's like break i think
}
$result = mysqli_query($conn, $sql);

// see if it's working
if ($result) {
    echo "added a new user";
} else {
    echo "error";
}
