<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nome = $_POST['nome'];
$emil = $_POST['email'];
$mensagem = $_POST['mensagem'];

        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "omiya2021@hotmail.com");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "omiya2015@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá Omiya <br><br>Nova mensagem de contato <br><br>Nome: $nome<br>Email: $email <br>Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = 'SG.wVZdgdfM6eQdaKsuvCN5Iddg.Q6n-9PmspvMAIymVjj-4578frrhkERjtrt';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";
       
        ?>
    </body>
</html>
