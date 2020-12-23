<?php
require "config/config.php";
require "model/user.php";



if(isset($_POST['uiSubmit']))
{
    $Message = '';
    $uiFname_cv = "";
    $uiLname_cv = "";
    $uiPhone_cv = "";
    $uiUsername_cv = "";
    $uiFname_cv = $_POST['uiFname'];
    $uiLname_cv = $_POST['uiLname'];
    $uiUsername_cv = $_POST['uiUsername'];
    $uiPhone_cv = $_POST['uiPhone'];

    $validationMessage = validation();
    if($validationMessage == "") {
        $u = new user();
        $u->setName($_POST['uiFname']);
        $u->setFamily($_POST['uiLname']);
        $u->setUsername($_POST['uiUsername']);
        $u->setPassword($_POST['uiPass']);
        $u->setTelephone($_POST['uiPhone']);
        if($u->Save())
            $Message = 'You have successfully registered.';
        else
            $Message = 'The username already exists. Please use a different username.';
    }
    else
        $Message = $validationMessage;
}



if(isset($_POST['uiLogin']))
{
    session_start();
    unset($_SESSION['USER']);
    require "config/config.php";
    require "model/user.php";
    $Message = '';

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

include "view/login.html";




function validation()
{
    $Message = "";
    if($_POST["uiFname"] == "")
        $Message = 'Enter your name'."<br/>";
    if($_POST["uiLname"] == "")
        $Message .= 'Enter your family'."<br/>";
    if($_POST["uiUsername"] == "")
        $Message .= 'Enter your username.'."<br/>";
    if($_POST["uiPass"] == "")
        $Message .= 'Enter your password'."<br/>";
    if($_POST["uiPhone"] == "")
        $Message .= 'Enter your Phone number'."<br/>";

    if($_POST["uiPass"] != $_POST["uiPass_rep"])
        $Message .= 'Password and confirmation password do not match.'."<br/>";


    return $Message;
}

?>