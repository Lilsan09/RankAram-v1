<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/SessionFlash.php');

try {
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      //////////////////////////// NETTOYAGE //////////////////////////
      $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
      $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
      $password = filter_input(INPUT_POST, 'password');
      $confirmpassword = filter_input(INPUT_POST, 'confirmPassword');
      ////////////////// PSEUDO ///////////////////
      if (empty($username)) {
         $errors['username'] = 'Champ obligatoire';
      } else {
         $isOk = filter_var($username, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
         if ($isOk == false) {
            $errors['username'] = 'Ce pseudo n\'est pas conforme';
         }
      }

      ///////////////// MAIL //////////////////
      if (empty($email)) {
         $errors['email'] = 'Champ obligatoire';
      } else {
         $isOk = filter_var($email, FILTER_VALIDATE_EMAIL, array("options" => array("regexp" => '/' . REGEX_EMAIL . '/')));
         if (!$isOk) {
            $errors['email'] = 'Adresse mail non valide';
         }
         if (User::checkEmail($email)) {
            $errors['email'] = 'Cette adresse mail est déjà utilisée';
         }
      }

      ///////////////// MOT DE PASSE-CONFIRM PASSWORD //////////////////
      if (empty($password)) {
         $errors['password'] = 'Champ obligatoire';
      }
      if (empty($confirmpassword)) {
         $errors['confirmpassword'] = 'Champ obligatoire';
      }
      if ($password != $confirmpassword) {
         $errors['testPassword'] = 'Les mots de passe ne correspondent pas';
      }
      $password = password_hash($password, PASSWORD_DEFAULT);

      
      if (empty($errors)) {
         $user = new User();
         $user->setEmail($email);
         $user->setUserName($username);
         $user->setPassword($password);
         $isAddedUser = $user->add();
         $id_user = $user->getId();
         $element = ['id' => $id_user, 'email' => $email];
         // $element['valid'] = time() + 60 * 15;
         $token = JWT::set($element);
         if ($isAddedUser) {
            $to = $email;
            $subject = 'Validation de votre compte Rank Aram.';
            $message = 'Pour valider votre compte, cliquez sur le lien suivant : ' . $_SERVER['HTTP_ORIGIN'] . '/controllers/validateAccountCtrl.php?token=' . $token;
            mail($to, $subject, $message);
            SessionFlash::set('Votre compte a bien été créé, veuillez le validez via le lien envoyé par mail, pensez a vérifier vos spams si vous ne le trouvez pas dans vos mails.');
            header('Location: /controllers/connexionCtrl.php');
            exit;
         }
         header('Location: /controllers/homeCtrl.php');
         exit();
      }
   }
} catch (PDOException $e) {
   die('Erreur : ' . $e->getMessage());
}

// appel des vues
require_once(__DIR__ . '/../views/templates/header.php');
require_once(__DIR__ . '/../views/inscription.php');
require_once(__DIR__ . '/../views/templates/footer.php');
