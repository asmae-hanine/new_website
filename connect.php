<?php
// firt of all i should take the input from the user 
// then i will go to DB and compare between the email and the passwords and if they are matching
// i will redirect the user to the workspace page 
if (isset($_POST["sbmit"])) {
    $email = $_POST["email"];
    $pass_word = $_POST["password"];
    echo "email: " . $email . "Password: " . $pass_word . "<br>";

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

$user_email = $_GET["email"];
$user_id = $_GET["id"];
$user_password = $_GET["password"];

$sql = "SELECT * FROM users WHERE id = $user_id";

if ($user_email === $email && $user_password !== $pass_word) {

    // if the email is correct but the password not 
    echo ("password incorrect!! ");
    exit;
} else if ($user_email === $email && $user_password === $pass_word) {
    //ila email kan kaysawi l email li kayn f DB , and  pass === DB pass ghaydkhlo l workspace.php
    header("Location: workspace.php");
} else {

    // if the email isn't correct it should create a new account or make sure that the email is correct
    echo ("The email is incorrect or isn't in our DB, Make sure you entered a correct Email and Password");
    echo ("<p>If you don't have one Create a new account <a href = 'inscrire.php'>here</a> ..</p>");
}
