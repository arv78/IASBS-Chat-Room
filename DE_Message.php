<?php
session_start();
require_once "config/config.php";
require_once "model/user.php";

if (isset($_POST['delete'])) {

    if(isset($_SESSION['USER'])) {
        unset($_SESSION['FLAG']);
        $_SESSION['FLAG'] = 2;
        $tmpMes = new message();
        $tmpMes->setto($_POST['M_to']);
        $tmpMes->setfrom($_POST['M_from']);
        $tmpMes->settime($_POST['M_time']);
        $tmpMes->delete_messages();
        header('Location: MessagePage.php');
    }
}

if (isset($_POST['edit'])) {

    if(isset($_SESSION['USER'])) {
        unset($_SESSION['FLAG']);
        $_SESSION['FLAG'] = 2;
        $tmpMes = new message();
        $tmpMes->setto($_POST['M_to']);
        $tmpMes->setfrom($_POST['M_from']);
        $tmpMes->settime($_POST['M_time']);
        $new_messages = $tmpMes->edit_messages($_POST['M_text']);
        echo json_encode($new_messages);
    }
}

?>