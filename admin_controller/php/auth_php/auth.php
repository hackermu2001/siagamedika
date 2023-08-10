<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the entered username and password match the expected values
    if ($username === "siagamedika" && $password === "siagamedika") {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        if (isset($_POST["remember"])) {
            // Set a cookie with the username, valid for 30 days
            setcookie("remember_username", $username, time() + (30 * 24 * 60 * 60), "/");
        } else {
            // Clear the "remember" cookie if it exists
            setcookie("remember_username", "", time() - 3600, "/");
        }

        header("Location: ../../index.php");
    } else {
        header("Location: ../../login.php?invalid=true");
    }
}
?>
