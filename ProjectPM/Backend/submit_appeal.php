<?php
session_start();
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fullname = mysqli_real_escape_string($connect, $_POST['fullName']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($connect, $_POST['phoneNumber']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    $inmateName = mysqli_real_escape_string($connect, $_POST['inmateName']);
    $appealType = mysqli_real_escape_string($connect, $_POST['appealType']);
    $appealDescription = mysqli_real_escape_string($connect, $_POST['appealDescription']);
    $previousCommunication = mysqli_real_escape_string($connect, $_POST['previousCommunication']);
    $consent = mysqli_real_escape_string($connect, $_POST['consent']);
    $termsAccepted = isset($_POST['terms']) ? 1 : 0; 

    //Phone Number Validation
    if (!preg_match('/^\d{11}$/', $phoneNumber)) {
        $_SESSION['error'] = "Phone number must be exactly 11 digits and contain only numbers.";
        header("Location: ../ClientSide/SubmitAppeal.php");
        exit();
    }

    $supportingDocs = null;
    if (!empty($_FILES["supportingDocuments"]["name"])) {
        $targetDir = "img/uploads";
        $targetFile = $targetDir . basename($_FILES["supportingDocuments"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
           $check = getimagesize($_FILES["supportingDocuments"]["tmp_name"]);
        if ($check !== false) {
            if (in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {

                if ($_FILES["supportingDocuments"]["size"] <= 2 * 1024 * 1024) {
                    
                    if (move_uploaded_file($_FILES["supportingDocuments"]["tmp_name"], $targetFile)) {
                        $supportingDocs = $targetFile;
                    } else {
                        $_SESSION['error'] = "Failed to upload Inmate ID image.";
                        echo "<script>alert('Failed to upload Inmate ID image.');</script>";
                        header("Location: ../ClientSide/SubmitAppeal.php");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = "Inmate ID image is too large.";
                    echo "<script>alert('Inmate ID image is too large.');</script>";
                    header("Location: ../ClientSide/SubmitAppeal.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "Invalid file type for Inmate ID image.";
                echo "<script>alert('Invalid file type for Inmate ID image.');</script>";
                header("Location: ../ClientSide/SubmitAppeal.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "File is not a valid image.";
            echo "<script>alert('File is not a valid image.');</script>";
            header("Location: ../ClientSide/SubmitAppeal.php");
            exit();
        }
    }

    $query = "INSERT INTO appeal (fullname, email, phone_number, address, appeal_type, inmate_name, appeal_description, supporting_docs, previous_comms, consent, terms) 
              VALUES ('$fullname', '$email', '$phoneNumber', '$address', '$appealType', '$inmateName', '$appealDescription','$supportingDocs',  '$previousCommunication', '$consent', '$termsAccepted')";

if (mysqli_query($connect, $query)) {
    echo "<script>alert('Form submitted successfully!'); window.location.href='../ClientSide/SubmitAppeal.php';</script>";
    exit();
} else {
    echo "<script>alert('Submission failed: " . mysqli_error($connect) . "'); window.location.href='../ClientSide/SubmitAppeal.php';</script>";
    exit();
}
} else {
echo "<script>alert('Invalid request method.'); window.location.href='../ClientSide/SubmitAppeal.php';</script>";
exit();
}
?>
