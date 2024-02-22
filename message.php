<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$message = $_POST['message'];

if(!empty($email) && !empty($message))
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $receiver = "codingnepalweb@gmail.com"; // Adicione aspas ao redor do endereço de email
        $subject = "From: $name <$email>";
        $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\n\nMessage: $message\n\nRegards,\n$name";
        $sender = "From: $email"; //Envio de email
        if(mail($receiver, $subject, $body, $sender)){
            echo "Sua mensagem foi enviada";
        }else{
            echo "Falha ao enviar sua mensagem!";
        }

    }else{
        echo "Informe um email válido";
    }
}
else
{
    echo "Email e mensagem são necessários!";
}
?>
