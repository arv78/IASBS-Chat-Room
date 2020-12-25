<?php
session_start();
require_once "congif/config.php";
require_once "model/user.php";

if (isset($_POST['delete'])) {

    if(isset($_SESSION['USER'])) {
        $tmpMes = new message();
        $tmpMes->setto($_POST['M_to']);
        $tmpMes->setfrom($_POST['M_from']);
        $tmpMes->settime($_POST['M_time']);
        $new_messages = $tmpMes->delete_messages();
        echo json_encode($new_messages);
    }
}

if (isset($_POST['edit'])) {

    if(isset($_SESSION['USER'])) {
        $tmpMes = new message();
        $tmpMes->setto($_POST['M_to']);
        $tmpMes->setfrom($_POST['M_from']);
        $tmpMes->settime($_POST['M_time']);
        $new_messages = $tmpMes->edit_messages($_POST['M_text']);
        echo json_encode($new_messages);
    }
}

?>