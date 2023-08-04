<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the entered username and password match the expected values
    if ($username === "admin" && $password === "admin123") {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("Location: ../../index.php");
    } else {
        echo "Invalid username or password.";
    }
}
?>
