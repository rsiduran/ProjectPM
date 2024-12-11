<?php
session_start();
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $visitorName = mysqli_real_escape_string($connect, $_POST['visitorName']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($connect, $_POST['phoneNumber']);
    $idType = mysqli_real_escape_string($connect, $_POST['idType']);
    $idNumber = mysqli_real_escape_string($connect, $_POST['idNumber']);
    $inmateName = mysqli_real_escape_string($connect, $_POST['inmateName']);
    $callType = mysqli_real_escape_string($connect, $_POST['callTypeVisit']);
    $relationship = mysqli_real_escape_string($connect, $_POST['relationship']);
    $visitReason = mysqli_real_escape_string($connect, $_POST['visitReason']);
    $termsAccepted = isset($_POST['terms']) ? 1 : 0; 

    //Phone Number Validation
    if (!preg_match('/^\d{11}$/', $phoneNumber)) {
        $_SESSION['error'] = "Phone number must be exactly 11 digits and contain only numbers.";
        header("Location: ../ClientSide/VirtualRequest.php");
        exit();
    }

    //Call Type Number Validation
    if (!preg_match('/^\d{11}$/', $callType)) {
        $_SESSION['error'] = "Phone number must be exactly 11 digits and contain only numbers.";
        header("Location: ../ClientSide/VirtualRequest.php");
        exit();
    }

    $inmateID = null;
    if (!empty($_FILES["inmateID"]["name"])) {
        $targetDir = "img/uploads";
        $targetFile = $targetDir . basename($_FILES["inmateID"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
           $check = getimagesize($_FILES["inmateID"]["tmp_name"]);
        if ($check !== false) {
            if (in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {

                if ($_FILES["inmateID"]["size"] <= 2 * 1024 * 1024) {
                    
                    if (move_uploaded_file($_FILES["inmateID"]["tmp_name"], $targetFile)) {
                        $inmateID = $targetFile;
                    } else {
                        $_SESSION['error'] = "Failed to upload Inmate ID image.";
                        echo "<script>alert('Failed to upload Inmate ID image.');</script>";
                        header("Location: ../ClientSide/VirtualRequest.php");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = "Inmate ID image is too large.";
                    echo "<script>alert('Inmate ID image is too large.');</script>";
                    header("Location: ../ClientSide/VirtualRequest.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "Invalid file type for Inmate ID image.";
                echo "<script>alert('Invalid file type for Inmate ID image.');</script>";
                header("Location: ../ClientSide/VirtualRequest.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "File is not a valid image.";
            echo "<script>alert('File is not a valid image.');</script>";
            header("Location: ../ClientSide/VirtualRequest.php");
            exit();
        }
    }

    $query = "INSERT INTO virtual (visitor_name, email, phone_number, id_type, id_number, inmate_name, inmate_id, number_call, relationship, reason, terms) 
              VALUES ('$visitorName', '$email', '$phoneNumber', '$idType', '$idNumber', '$inmateName', '$inmateID', '$callType', '$relationship', '$visitReason', '$termsAccepted')";

    if (mysqli_query($connect, $query)) {
        $_SESSION['success'] = "Visitation request submitted successfully!";
        header("Location: ../ClientSide/VirtualRequest.php");
        exit();
    } else {
        $_SESSION['error'] = "Submission failed: " . mysqli_error($connect);
        header("Location: ../ClientSide/VirtualRequest.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request method.";
    header("Location: ../ClientSide/VirtualRequest.php");
    exit();
}
?>
