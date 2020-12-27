<?php
session_start();
require_once "congif/config.php";
require_once "model/user.php";

if(isset($_SESSION['USER'])) {
    $u = unserialize($_SESSION['USER']);
    $m = unserialize($_SESSION['MESSAGE']);
    $tmpMes = new message();
    $tmpMes->setto($m->getto());
    $tmpMes->setfrom($u->getUsername());
    $tmpMes->settext($_POST['text']);
    $res_send = $tmpMes->send_messages();
    return $res_send;
}
?>