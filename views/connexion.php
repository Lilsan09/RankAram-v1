<?php
if (SessionFlash::exist()) {
?>
   <div class="alert alert-light alert-dismissible fade show" role="alert">
      <strong><?= SessionFlash::get() ?></strong>
      <button type="button" class="btn-close closeAlertBtn" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>

<?php } ?>
<form action="/controllers/connexionCtrl.php" class="bgGlobal container-fluid d-flex align-items-center justify-content-center text-light" method="POST">
   <fieldset class="row justify-content-center">
      <legend class="text-center mt-4">Se connecter</legend>
      <p class="text-light"><?= $errors['connexion'] ?? '' ;?></p>
      <div class="formStyle d-flex flex-column align-items-center">
         <div class="form-group col-10 col-lg-9 m-3">
            <label for="email" class="form-label">Adresse Mail</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="exemple@mail.com" pattern="<?= REGEX_EMAIL ?>">
         </div>
         <div class="form-group col-10 col-lg-9 m-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="******">
         </div>
         <button type="submit" class="btn col-4 col-lg-3 m-lg-4 m-3 text-light">Connexion</button>
         <p class="text-light"><a class="createAcc text-decoration-none" href="../controllers/forgetPasswordCtrl.php"><span class="dtailing">Mot de passe oublié..</span></a></p>
         <p class="text-light">Vous n'avez pas de compte ?<a class="text-decoration-none" href="../controllers/inscriptionCtrl.php"><span class=""> Créer un compte</span></a> maintenant !</p>
      </div>
   </fieldset>
</form>