<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Collect form data
    $name = $_POST['name'];
    $dateofcapture = $_POST['dateofcapture'];
    $dateohbirth = $_POST['dateohbirth'];
    $nationality = $_POST['nationality'];
    $education = $_POST['education'];
    $religion = $_POST['religion'];
    $sex = $_POST['sex'];
    $physicalcondition = $_POST['physicalcondition'];
    $placeofcapture = $_POST['placeofcapture'];
    $placeofbirth = $_POST['placeofbirth'];
    $address = $_POST['address'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $preparedby = $_POST['preparedby'];
    $dateofprepared = $_POST['dateofprepared'];
    $placeofprison = $_POST['placeofprison'];

    // Check if both images are uploaded
    if (!isset($_FILES['photofront']) || $_FILES['photofront']['error'] == 4 || !isset($_FILES['photoleft']) || $_FILES['photoleft']['error'] == 4) {
        echo "<script>alert('Both images are required!');</script>";
    } else {
        // Get file info for both images
        $photofront = $_FILES['photofront'];
        $photoleft = $_FILES['photoleft'];

        $validImageExtensions = ['jpg', 'jpeg', 'png'];

        // Validate the first image (photofront)
        $image1Extension = strtolower(pathinfo($photofront['name'], PATHINFO_EXTENSION));
        if (!in_array($image1Extension, $validImageExtensions)) {
            echo "<script>alert('Invalid file type for image 1. Only JPG, JPEG, PNG are allowed.');</script>";
            exit;
        }

        // Validate the second image (photoleft)
        $image2Extension = strtolower(pathinfo($photoleft['name'], PATHINFO_EXTENSION));
        if (!in_array($image2Extension, $validImageExtensions)) {
            echo "<script>alert('Invalid file type for image 2. Only JPG, JPEG, PNG are allowed.');</script>";
            exit;
        }

        // Generate new names for images to prevent overwriting
        $image1NewName = uniqid('img1_', true) . '.' . $image1Extension;
        $image2NewName = uniqid('img2_', true) . '.' . $image2Extension;

        // Define the path for where images will be stored (make sure this directory exists and is writable)
        $image1Path = '../assets/images/' . $image1NewName;
        $image2Path = '../assets/images/' . $image2NewName;

        // Move the uploaded files to the server
        if (move_uploaded_file($photofront['tmp_name'], $image1Path) && move_uploaded_file($photoleft['tmp_name'], $image2Path)) {

            // Prepare the SQL query to insert data into the database
            $query = "INSERT INTO record (
                        name, dateofcapture, dateohbirth, nationality, education, religion, sex, physicalcondition, 
                        placeofcapture, placeofbirth, address, father, mother, photofront, photoleft, 
                        preparedby, dateofprepared, placeofprison
                    ) VALUES (
                        '$name', '$dateofcapture', '$dateohbirth', '$nationality', '$education', '$religion', '$sex', '$physicalcondition',
                        '$placeofcapture', '$placeofbirth', '$address', '$father', '$mother', '$image1NewName', '$image2NewName',
                        '$preparedby', '$dateofprepared', '$placeofprison'
                    )";

            // Execute the query
            if (mysqli_query($connect, $query)) {
                echo "<script>
                        alert('Record added successfully.');
                        window.location.href = '../AdminSide/Records.php'; // Adjust this to where you want to redirect after success
                    </script>";
            } else {
                echo "<script>alert('Error inserting record into database.');</script>";
            }
        } else {
            echo "<script>alert('Error uploading images.');</script>";
        }
    }

} else {
    echo "<script>alert('Form not submitted via POST method.');</script>";
}

?>
