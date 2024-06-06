    <?php //index.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth   = true;
    $mail->Username   = '5be8b9cdbf6286';
    $mail->Password   = 'd3cde65ef297fe';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->CharSet    = PHPMailer::CHARSET_UTF8;

    $mail->setFrom('gabriel@gmail.com', 'Gabriel');
    $mail->addAddress('ellen@outlook.com', 'Ellen');

    $mail->isHTML(true);
    $mail->Subject = 'Notas do segundo trimestre';
    $mail->Body    = 'Parabéns! Você foi <b style="color:green">aprovado</b>';
    $mail->AltBody = 'Parabéns! Você foi aprovado';

    $mail->send();
    echo 'A mensagem foi enviada' . PHP_EOL;
} catch (Exception $e) {
    echo "A mensagem não pode ser enviada. Error: {$mail->ErrorInfo}";
}
?>
,

    ?>