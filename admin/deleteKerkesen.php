<?php
    include('../config.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM kerkesatanulimit WHERE id=:id";
    $stm = $con->prepare($sql);
    $stm->bindParam(':id', $id);
    $stm->execute();
    $data = $stm->fetch();


    $gender_sql = "SELECT gjinia FROM patient_table WHERE numri_personal=:numri_personal";
    $gender_prep = $con->prepare($gender_sql);
    $gender_prep->bindParam(':numri_personal', $data['numri_personal']);
    $gender_prep->execute();
    $gender_data = $gender_prep->fetch();

    if($gender_data['gjinia'] == 'Mashkull'){
        $gjinia = 'I nderuar z.';
    } else{
        $gjinia = 'E nderuar znj.';
    }

    require 'C:\xampp\htdocs\Sistemi-per-rezervimin-e-termineve\patientSide\PHPMailer-master\src\Exception.php';
    require 'C:\xampp\htdocs\Sistemi-per-rezervimin-e-termineve\patientSide\PHPMailer-master\src\PHPMailer.php';
    require 'C:\xampp\htdocs\Sistemi-per-rezervimin-e-termineve\patientSide\PHPMailer-master\src\SMTP.php';

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'terminet.online@gmail.com';
        $mail->Password   = 'vaiddzxpncfvvksh';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;         


        $mail->setFrom('terminet.online@gmail.com', 'sistemi-termineve-online.com');
        $mail->addAddress($data['email'], $data['emri_pacientit'].' '.$data['mbiemri_pacientit']); 


        //Content
        $mail->isHTML(true);        


        $mail->Subject = 'Kerkesa per anulimin e terminit';
        $mail->Body    = "<p style='font-size: 18px; color: black;'>
                    $gjinia{$data['mbiemri_pacientit']},
                    <br>
                    Kërkesa juaj për anulimin e terminit me datë:{$data['data']}, në orën:{$data['ora']}, 
                    për arsyen se: '{$data['arsyeja_anulimit']}' nuk është aprovuar.
                    <br>
                    Jeni te obliguar që të shkoni në këtë termin. <br>
                    Mosardhja juaj do të ndëshkohet me përjashtimin nga sistemi-termineve-online.com
                    <br> <br>
                    Me respekt, <br>
                    sistemi-termineve-online.com
                    </p>";

        $mail->send();

        $del_kerkesa_sql = "DELETE FROM kerkesatanulimit WHERE id=:id";
        $del_kerkesa_prep = $con->prepare($del_kerkesa_sql);
        $del_kerkesa_prep->bindParam(':id', $id);

        if ($del_kerkesa_prep->execute()) {
            echo "<script>
                alert('Kerkesa nuk u miratua.');
                window.location.replace('kerkesatAnulimit.php');
            </script>";
        }

    exit();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>