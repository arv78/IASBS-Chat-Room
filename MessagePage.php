<?php
session_start();
require "model/user.php";
if(!isset($_SESSION['USER'])) {
    header('Location: index.php');
}
else
{
    $u = unserialize($_SESSION['USER']);
    $WelcomeMessage = 'Welcome '.$u->getName(). ' '.$u->getFamily();

    if ($_POST['contact_username_submit']) {
        unset($_SESSION['MESSAGE']);
        $m = new message();
        $m->setto($_POST['contact_username']);
        $_SESSION['MESSAGE'] = serialize($m);
    }
}

require "config/config.php";
include "view/shared/contacts.html";
include "view/shared/messeges.html";


?>

