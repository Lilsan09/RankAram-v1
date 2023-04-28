<?php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/JWT.php');

$errors = [];

if(isset($_POST['token'])){
    if(User::getUserById(JWT::get($_POST['token']))){
        $id = intval(JWT::get($_POST['token']));
    }else{
        $errors['utilisateur'] = 'Nous n\'avons pu vous identifier, veuillez réessayer.';
    }
}

if(!isset($_POST['password']) || empty($_POST['password'])){
    $errors['motdepasse'] = 'Aucun mot de passe n\'a été renseigné'; 
}else{
    $newPassword = $_POST['password'];
}

if(isset($_POST['confirmPassword'])){
    $confirmPassword = $_POST['confirmPassword'];
}else{
    $errors['motdepasse'] = 'Vous devez confirmer le nouveau mot de passe'; 
}

if(empty($errors)){
    User::modifyPassword($id, password_hash($newPassword, PASSWORD_DEFAULT));
    header('Location: http://localhost/controllers/connexionCtrl.php');
    exit();
}else{
    header('Location: http://localhost/controllers/newPasswordCtrl.php?token='.JWT::get($_POST['token']));
    exit();
}
