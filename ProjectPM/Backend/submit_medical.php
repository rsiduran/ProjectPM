<?php
session_start();
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fullname = mysqli_real_escape_string($connect, $_POST['fullName']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($connect, $_POST['phoneNumber']);
    $homeAddress = mysqli_real_escape_string($connect, $_POST['address']);
    $inmateName = mysqli_real_escape_string($connect, $_POST['patientName']);
    $inmateAge = mysqli_real_escape_string($connect, $_POST['patientAge']);
    $medicalCondition = mysqli_real_escape_string($connect, $_POST['medicalCondition']);
    $medicalHistory = mysqli_real_escape_string($connect, $_POST['medicalHistory']);
    $assistanceNeeded = mysqli_real_escape_string($connect, $_POST['typeOfAssistance']);
    $additionalInfo = mysqli_real_escape_string($connect, $_POST['additionalInfo']);
    $termsAccepted = isset($_POST['terms']) ? 1 : 0; 

    //Phone Number Validation
    if (!preg_match('/^\d{11}$/', $phoneNumber)) {
        $_SESSION['error'] = "Phone number must be exactly 11 digits and contain only numbers.";
        header("Location: ../ClientSide/MedicalRequest.php");
        exit();
    }
    //Age Validation
    if (!preg_match('/^\d{1,4}$/', $inmateAge) || $inmateAge > 999) {
        $_SESSION['error'] = "Age must be a number and should not exceed 3 digits.";
        header("Location: ../ClientSide/MedicalRequest.php");
        exit();
    }


    $query = "INSERT INTO medical (fullname, email, phone_number, home_address, inmate_name, inmate_age, medical_condition, medical_history, assistance, additional_info, terms) 
              VALUES ('$fullname', '$email', '$phoneNumber', '$homeAddress', '$inmateName', '$inmateAge', '$medicalCondition', '$medicalHistory', '$assistanceNeeded', '$additionalInfo', '$termsAccepted')";

    if (mysqli_query($connect, $query)) {
        $_SESSION['success'] = "Medical request submitted successfully!";
        header("Location: ../ClientSide/MedicalRequest.php");
        exit();
    } else {
        $_SESSION['error'] = "Submission failed: " . mysqli_error($connect);
        header("Location: ../ClientSide/MedicalRequest.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request method.";
    header("Location: ../ClientSide/MedicalRequest.php");
    exit();
}
?>
