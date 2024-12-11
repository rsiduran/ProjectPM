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
    $query = "SELECT * FROM `virtual` WHERE id = $regID";
    $result = mysqli_query($connect, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentStatus = $row['terms'];
        $nameUser = $row['visitor_name'];
        $givenUser = $row['email'];
        $inmateName = $row['inmate_name'];
        mysqli_free_result($result);

        // Check status and update
        if ($currentStatus === '1') {
            $updateQuery = "UPDATE `virtual` SET terms = '2' WHERE id = '$regID'";
            $result = mysqli_query($connect, $updateQuery);
            if ($result) {
                try {
                    // Sending email
                    $mail->addAddress($givenUser);
                    $mail->isHTML(true);
                    $mail->Subject = 'JAIL SYSTEM VISITATION REQUEST';
                    $mail->Body = 'Dear ' . htmlspecialchars($nameUser, ENT_QUOTES, 'UTF-8') . ',<br><br>
                    Your visitation request for <strong>' . htmlspecialchars($inmateName, ENT_QUOTES, 'UTF-8') . '</strong> has been approved.<br><br>
                    Here are the details of your approved visit:<br>
                    <strong>Contact Name:</strong> ' . htmlspecialchars($nameUser, ENT_QUOTES, 'UTF-8') . '<br>
                    <strong>Inmate Name:</strong> ' . htmlspecialchars($inmateName, ENT_QUOTES, 'UTF-8') . '<br>
                    <strong>Visitation Date:</strong> Monday - Friday<br>
                    <strong>Visitation Time:</strong> 10:00AM - 3:00PM<br><br>
                    Please contact this number: <strong>09152987359</strong> during the specified time and date.<br><br>
                    Thank you,<br>
                    The Jail System Team';
                    $mail->isHTML(true); 
                    $mail->send();


                    echo "<script>
                            alert('Successfully Confirmed');
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
                        alert('Unsuccessfully Confirmed');
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
