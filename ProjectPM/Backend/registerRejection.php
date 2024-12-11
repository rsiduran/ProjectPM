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
            $updateQuery = "UPDATE `registration` SET RegistrationStatus = 'Rejected' WHERE RegistrationID = '$regID'";
            $result = mysqli_query($connect, $updateQuery);
            if ($result) {
                try {
                    // Sending email
                    $mail->addAddress($givenUser);
                    $mail->isHTML(true);
                    $mail->Subject = 'JAIL SYSTEM ACCOUNT REGISTRATION';
                    $mail->Body = 'Hello, ' . htmlspecialchars($nameUser, ENT_QUOTES, 'UTF-8') . '!<br><br>
                    We regret to inform you that your registration for the Jail System has not been approved at this time.<br><br>
                    Thank you for your understanding.<br><br>
                    Best regards,<br>
                    The Jail System Team';
                    $mail->isHTML(true); // Ensure the email is sent in HTML format
                    $mail->send();

                    echo "<script>
                            alert('Registration Rejected');
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
