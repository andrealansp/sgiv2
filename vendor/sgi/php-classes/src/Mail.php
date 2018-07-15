<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SGI;

/**
 * Description of Mail
 *
 * @author andre
 */
class Mail {
     const USERNAME = "andrealansp@gmail.com";
    const PASSWORD = "mateus1128";
    const NAME_FROM = "Hcode Store";

    private $email;

    public function __construct($toAddress, $toName, $subject, $tplname, $data = array()) {

        $config = array(
            "base_url" => null,
            "tpl_dir" => $_SERVER['DOCUMENT_ROOT'] . "/views/email/",
            "cache_dir" => $_SERVER['DOCUMENT_ROOT'] . "/views-cache/",
            "debug" => false
        );

        Tpl::configure($config);

        $this->tpl = new Tpl();

        foreach ($data as $key => $value) {
            $this->tpl->assign($key, $value);
        }
        $html = $this->tpl->draw($tplname, TRUE);
        $this->mail = new \PHPMailer;

//Tell PHPMailer to use SMTP

        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $this->mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
        $this->mail->SMTPDebug = 0;

//Set the hostname of the mail server
        $this->mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $this->mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
        $this->mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
        $this->mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
        $this->mail->Username = Mailer::USERNAME;

//Password to use for SMTP authentication
        $this->mail->Password = Mailer::PASSWORD;

//Set who the message is to be sent from
        $this->mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
        $this->mail->addAddress($toAddress, $toName);

//Set the subject line
        $this->mail->Subject = utf8_decode($subject);

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
        $this->mail->msgHTML(utf8_decode($html));

//Replace the plain text body with one created manually
        $this->mail->AltBody = 'Não consegue ver, abra no navegador !';
    }

    public function send() {
        try {
            return $this->mail->send();
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
    }
}
