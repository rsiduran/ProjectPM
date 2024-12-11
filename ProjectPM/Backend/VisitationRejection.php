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
    $query = "SELECT * FROM `visitation` WHERE id = $regID";
    $result = mysqli_query($connect, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentStatus = $row['terms_accepted'];
        $nameUser = $row['visitor_name'];
        $givenUser = $row['email'];
        $inmateName = $row['inmate_name'];
        mysqli_free_result($result);

        // Check status and update
        if ($currentStatus === '1') {
            $updateQuery = "UPDATE `visitation` SET terms_accepted = '2' WHERE id = '$regID'";
            $result = mysqli_query($connect, $updateQuery);
            if ($result) {
                try {
                    // Sending email
                    $mail->addAddress($givenUser);
                    $mail->isHTML(true);
                    $mail->Subject = 'JAIL SYSTEM VISITATION REQUEST';
                    $mail->Body = 'Dear ' . htmlspecialchars($nameUser, ENT_QUOTES, 'UTF-8') . ',<br><br>
                    Your visitation request for <strong>' . htmlspecialchars($inmateName, ENT_QUOTES, 'UTF-8') . '</strong> has been rejected.<br><br>
                    Please submit the necessary requirements.<br>
                    Thank you,<br>
                    The Jail System Team';
                    $mail->isHTML(true); 
                    $mail->send();


                    echo "<script>
                            alert('Successfully Rejected');
                            document.location.href = '../AdminSide/VisitationRequest.php';
                          </script>";
                } catch (Exception $e) {
                    echo "<script>
                            alert('Email failed to send: {$mail->ErrorInfo}');
                            document.location.href = '../AdminSide/VisitationRequest.php';
                          </script>";
                }
            } else {
                echo "<script>
                        alert('Unsuccessfully Rejected');
                        document.location.href = '../AdminSide/VisitationRequest.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Error: Request not Processed.');
                    document.location.href = '../AdminSide/VisitationRequest.php';
                  </script>";
        }
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
