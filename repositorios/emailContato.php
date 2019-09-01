<?php

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';

// recebe os parametros para envio da mensagem

function enviaEmail($email_cliente, $nome_cliente,$celular,$mensagem){
    
    //Create a new PHPMailer instance
    $mail = new PHPMailer;

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    
    //aceita acentuação
    $mail->CharSet='UTF-8';
    
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "emailparaenviar@gmail.com";// conta q enviara menstagem(fara o login automatico e enviara msg)

    //Password to use for SMTP authentication
    $mail->Password = "senha";// senha da conta q enviara mensagem

    //Set who the message is to be sent from
    $mail->setFrom('emailparaenviar@gmail.com', 'Contato');// destino da mensagem

    //Set an alternative reply-to address
    $mail->addReplyTo($email_cliente, $nome_cliente);// email cuja a resposta deve ser encaminhada

    //Set who the message is to be sent to
    $mail->addAddress('emailparaenviar@gmail.com', 'a');

    //Set the subject line
    $mail->Subject = 'Email de Contato';
    
    // corpo da msg
    $mail->Body="<h3>$mensagem</h3><br><h4>Email: $email_cliente</h4><h4>Celular: $celular</h4>";

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
   // $mail->msgHTML(file_get_contents('cliente_cadastro.php'), __DIR__);

    //Replace the plain text body with one created manually
    $mail->AltBody = "Olá $nome_cliente";

    //Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');

    //send the message, check for errors
    if (!$mail->send()) {
        echo "<div class='alert alert-danger' role='alert'>
        Email não enviado !
    </div>";
    } else {
        echo "<div class='alert alert-success' role='alert'>
                Email enviado com sucesso!
            </div>";
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
    }

    //Section 2: IMAP
    //IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
    //Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
    //You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
    //be useful if you are trying to get this working on a non-Gmail IMAP server.
    function save_mail($mail)
    {
        //You can change 'Sent Mail' to any other folder or tag
        $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

        //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
        $imapStream = imap_open($path, $mail->Username, $mail->Password);

        $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
        imap_close($imapStream);

        return $result;
    }
}