<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['user_id'];
    $password = $_POST['password'];

    // Check if the user is admin
    if ($userId === 'admin' && $password === 'admin') {
        $_SESSION['role'] = 'admin';
        header("Location: ../AdminSide/dashboard.php");
        exit();
    }

    // Check if the user is client
    $query = "SELECT * FROM Registration WHERE Email = '$userId' AND Password = '$password' AND RegistrationStatus = 'Approved'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['role'] = 'client';
        $_SESSION['user'] = $row; // Store user info in session
        header("Location: ../ClientSide/dashboard.php");
        exit();
    } else {
        $errorMessage = "Invalid User or Password. Please try again.";
        header("Location: ../index.php?error=" . urlencode($errorMessage));
        exit();
    }
}
?>
