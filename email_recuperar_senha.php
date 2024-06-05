<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$temp_password = bin2hex(random_bytes(4));

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
    $mail->Subject = 'Recuperação de Senha';

    // Corpo do email com HTML e CSS inline
    $mail->Body = "
    <html>
    <head>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f9f9f9;
                margin: 0;
                padding: 0;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
            .container {
                background-color: #ffffff;
                margin: 20px auto;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                max-width: 600px;
            }
            .header {
                text-align: center;
                padding: 20px;
                background-color: #4CAF50;
                color: white;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }
            .header img {
                max-width: 100px;
                margin-bottom: 10px;
            }
            .header h1 {
                margin: 0;
                font-size: 28px;
            }
            .content {
                padding: 20px;
                color: #333;
                line-height: 1.6;
            }
            .content p {
                margin: 0 0 10px;
            }
            .footer {
                text-align: center;
                padding: 10px;
                font-size: 12px;
                color: #777;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Logo_NIKE.svg/2560px-Logo_NIKE.svg.png' alt='Logo'>
                <h1>Recuperação de Senha</h1>
            </div>
            <div class='content'>
                <p>Olá Ellen,</p>
                <p>Sua senha temporária é: <b>$temp_password</b></p>
                <p>Por favor, altere sua senha após o login.</p>
            </div>
            <div class='footer'>
                <p>Esta é uma mensagem automática. Por favor, não responda.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $mail->AltBody = "Olá Ellen, Sua senha temporária é: $temp_password. Por favor, altere sua senha após o login.";

    $mail->send();
    echo 'A mensagem de recuperação de senha foi enviada' . PHP_EOL;
} catch (Exception $e) {
    echo "A mensagem não pode ser enviada. Error: {$mail->ErrorInfo}";
}
?>
