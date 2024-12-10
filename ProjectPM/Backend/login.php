<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId = $_POST['user_id'];
    $password = $_POST['password'];


    if ($userId == 'admin' && $password == 'admin') {
        header("Location: ../AdminSide/dashboard.php");
        exit();
    }  
    elseif ($userId == 'client' && $password == 'client') {
        header("Location: ../ClientSide/dashboard.php");
        exit();
    } 
    else {
        $errorMessage = "Invalid User or Password. Please try again.";
        header("Location: ../index.php?error=" . urlencode($errorMessage));
        exit();
    }
}


