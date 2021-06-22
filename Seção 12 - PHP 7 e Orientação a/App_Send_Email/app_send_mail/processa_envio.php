<?php

    //Não vou mover esse aquivo pra um diretorio não publico por segurança pois não contem nada que não possa vazar
    require "./bibliotecas/PHPMailer/Exception.php";
    require "./bibliotecas/PHPMailer/OAuth.php";
    require "./bibliotecas/PHPMailer/PHPMailer.php";
    require "./bibliotecas/PHPMailer/POP3.php";
    require "./bibliotecas/PHPMailer/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    //print_r($_POST);

    class Mensagem{
        private $para = null;
        private $assunto = null;
        private $mensagem = null;
        public $status = array('codigo_status' => null, 'descricao_status' => '');

        public function __get($atributo)
        {
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function mensagemValida(){
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){
                return false;
            }

            return true;
        }
    }

    $messagem = new Mensagem();

    $messagem->__set('para',$_POST['para']);
    $messagem->__set('assunto',$_POST['assunto']);
    $messagem->__set('mensagem',$_POST['mensagem']);
    //echo '<br/>';
    //print_r($messagem);

    if(!$messagem->mensagemValida()){
        echo 'Mensagem não é valida';
        header('Location: index.php');
    }

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = false;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'thiagomotateste@gmail.com';                 // SMTP username
        $mail->Password = 'james@2021';
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('thiagomotateste@gmail.com', 'Thiago Mota Teste app');
        $mail->addAddress($messagem->__get('para'));
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $messagem->__get('assunto');
        $mail->Body    = $messagem->__get('mensagem');
        $mail->AltBody = 'É nessário utilizar um cliente que tenha suporte a html pra ter acesso total a essa mensagem';

        $mail->send();

        $messagem->status['codigo_status'] = 1;
        $messagem->status['descricao_status'] = 'Message has been sent';
        
    } catch (Exception $e) {

        $messagem->status['codigo_status'] = 2;
        $messagem->status['descricao_status'] = 'Message could not be sent. '. 'Mailer Error: ' . $mail->ErrorInfo;
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>App Mail Send</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

            <div class="row">
                <div class="col-md-12">
                    <? if($messagem->status['codigo_status'] == 1) { ?>
                        
                        <div class="container align-items-center">
                            <h1 class="display-4 text-sucess d-flex justify-content-center">
                                sucesso
                            </h1>
                            <p class="d-flex justify-content-center"><?= $messagem->status['descricao_status'] ?></p>
                            <a href="index.php" class="btn btn-success btn-lg mt-5 text-white d-flex justify-content-center">Voltar</a>
                        </div>

                    <?}?>

                    <? if($messagem->status['codigo_status'] == 2) { ?>
                        
                        <div class="container align-items-center">
                            <h1 class="display-4 text-danger d-flex justify-content-center">
                                Ops!
                            </h1>
                            <p class="d-flex justify-content-center"><?= $messagem->status['descricao_status'] ?></p>
                            <a href="index.php" class="btn btn-success btn-lg mt-5 text-white d-flex justify-content-center">Voltar</a>
                        </div>

                    <?}?>

                </div>
            </div>

        </div>
    </body>
</html>