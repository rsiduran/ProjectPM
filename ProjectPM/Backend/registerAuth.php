<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if (isset($_POST["submit"])) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $detainee_name = $_POST['detainee_name'];
        $relationship = $_POST['relationship'];

        $randomPassword = rand(100000, 999999);

        if ($_FILES["image"]["error"] == 4) {
            echo "<script> alert('Image Does Not Exist'); </script>";
        } else {
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];
        
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));

            if (!in_array($imageExtension, $validImageExtension)) {
                echo "<script>alert('Invalid Image Extension');
                document.location.href = '../index.php';
                </script>";
            } else if ($fileSize > 1000000) {
                echo "<script>alert('Image Size Is Too Large');
                    document.location.href = '../index.php';
                </script>";
            } else {
                $newImageName = uniqid() . '.' . $imageExtension;
                move_uploaded_file($tmpName, 'img/' . $newImageName);

                // Inserting the data into the Registration table with the generated random password
                $query = "INSERT INTO Registration 
                            (FullName, Email, Address, DetaineesFullName, Relationship, IDPicture, RegistrationStatus, Password) 
                          VALUES ('$full_name', '$email', '$address', '$detainee_name', '$relationship', '$newImageName', 'Pending', '$randomPassword')";
                
                if (mysqli_query($connect, $query)) {
                    echo "<script>
                            alert('Successfully Registered');
                            document.location.href = '../index.php';
                          </script>";
                } else {
                    echo "<script>alert('Error: " . mysqli_error($connect) . "');</script>";
                }
            }
        }
    } else {
        echo 'Submit button not found';
    }
} else {
    echo 'Form not submitted using POST';
}
?>
