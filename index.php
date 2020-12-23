<?php
session_start();
unset($_SESSION['USER']);
require "config.php";
require "model/user.php";

$Message = '';
if(isset($_POST['uiLogin']))
{
    $u = new user();
    $u->setUsername($_POST['uiUser']);
    $u->setPassword($_POST['uiPass1']);

    if($u->checkUserPass())
    {
        $_SESSION['USER'] = serialize($u);
        header('Location: MessagePage.php');
    }

    $Message = 'Invalid username or password.';
}


include $ViewPath."login.html";

include $ShareFolderPath."footer.html";

?>