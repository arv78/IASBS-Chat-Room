<?php
session_start();
require_once "config/config.php";
require_once "model/user.php";

if(isset($_SESSION['USER'])) {
    if (isset($_POST['uiSend'])) {
        unset($_SESSION['FLAG']);
        $_SESSION['FLAG'] = 2;
        $u = unserialize($_SESSION['USER']);
        $m = unserialize($_SESSION['MESSAGE']);
        $tmpMes = new message();
        $tmpMes->setto($m->getto());
        $tmpMes->setfrom($u->getUsername());
        $tmpMes->settext($_POST['text']);
        $res_send = $tmpMes->send_messages();
        if ($res_send){
            header('Location: MessagePage.php');
        }
        echo("could send the message!");
    }
}
?>