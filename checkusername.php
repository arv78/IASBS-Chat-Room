<?php
require_once "config/config.php";
require_once "model/user.php";

if(isset($_POST['un'])) {
    $user = new user();
    $user->setUsername($_REQUEST["un"]);
    if ($user->IsUsernameExist())
        echo "The username already exists. Please use a different username.";
}