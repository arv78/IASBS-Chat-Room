<?php
session_start();
require_once "congif/config.php";
require_once "model/user.php";

if(isset($_SESSION['USER'])) {
    $tmpMes = new message();
    $tmpMes->setto($_POST['D_to']);
    $tmpMes->setfrom($_POST['D_from']);
    $tmpMes->settime($_POST['D_time']);
    $new_messages = $tmpMes->delete_messages();
    echo json_encode($new_messages);
}

?>