<?php
session_start();
require_once "config/config.php";
require_once "model/user.php";

if(isset($_SESSION['USER'])) {
    $u = unserialize($_SESSION['USER']);
    $user_temp = new user();
    $user_temp->setUsername($u->getUsername());
    $profile = $user_temp->Getprofile();
    echo json_encode($profile);
}

?>