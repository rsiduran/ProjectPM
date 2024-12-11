<?php
include 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_GET['regID'])) {
    $regID = $_GET['regID'];

    // PHPMailer setup
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'rsidyd@gmail.com'; // Your Gmail address
    $mail->Password = 'ptbh ukjl bexw bbvm'; // Your Gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('rsidyd@gmail.com');

    // Fetching user data
    $query = "SELECT * FROM `registration` WHERE RegistrationID = $regID";
    $result = mysqli_query($connect, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentStatus = $row['RegistrationStatus'];
        $nameUser = $row['FullName'];
        $givenUser = $row['Email'];
        $givenPW = $row['Password'];
        mysqli_free_result($result);

        // Check status and update
        if ($currentStatus === 'Pending') {
            $updateQuery = "UPDATE `registration` SET RegistrationStatus = 'Approved' WHERE RegistrationID = '$regID'";
            $result = mysqli_query($connect, $updateQuery);
            if ($result) {
                try {
                    // Sending email
                    $mail->addAddress($givenUser);
                    $mail->isHTML(true);
                    $mail->Subject = 'JAIL SYSTEM ACCOUNT REGISTRATION';
                    $mail->Body = 'Congratulations, ' . htmlspecialchars($nameUser, ENT_QUOTES, 'UTF-8') . '!<br><br>
                    Your registration for the Jail System has been successfully completed. You can now log in to your account using the following credentials:<br><br>
                    <strong>User:</strong> ' . htmlspecialchars($givenUser, ENT_QUOTES, 'UTF-8') . '<br>
                    <strong>Password:</strong> ' . htmlspecialchars($givenPW, ENT_QUOTES, 'UTF-8') . '<br><br>
                    Please keep this information secure and do not share it with others.<br><br>
                    Thank you,<br>
                    The Jail System Team';
                    $mail->isHTML(true); 
                    $mail->send();


                    echo "<script>
                            alert('Successfully Registered');
                            document.location.href = '../AdminSide/dashboard.php';
                          </script>";
                } catch (Exception $e) {
                    echo "<script>
                            alert('Email failed to send: {$mail->ErrorInfo}');
                            document.location.href = '../AdminSide/dashboard.php';
                          </script>";
                }
            } else {
                echo "<script>
                        alert('Unsuccessfully Registered');
                        document.location.href = '../AdminSide/dashboard.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Error: Registration not in Pending state.');
                    document.location.href = '../AdminSide/dashboard.php';
                  </script>";
        }
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
