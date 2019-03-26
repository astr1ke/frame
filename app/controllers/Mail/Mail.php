<?php
/**
 * Created by PhpStorm.
 * User: astri
 * Date: 2019-03-25
 * Time: 21:57
 */

namespace Controllers\Mail;


class Mail
{

    public static function registerSendMail($to, $message) {
        $subject = "Activate your mail on the site Framework Blog";
        $message = "To activate your account follow the link \r\n" . $message;
        $message = wordwrap($message, 70, "\r\n");

        //$headers  = "Content-type: text/html; charset=windows-1251 \r\n";
        $headers = "From: <FrameworkBlog>\r\n";
        $headers .= "The letter was created automatically, do not reply to it.\r\n";

        return mail($to, $subject, $message, $headers);
    }
}