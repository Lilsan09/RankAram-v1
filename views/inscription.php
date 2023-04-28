<?php
if (SessionFlash::exist()) {
?>
   <div class="alert alert-dismissible fade show text-white" role="alert">
      <strong><?= SessionFlash::get() ?></strong>
      <button type="button" class="btn-close btn-close-white closeAlertBtn" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
<?php } ?>

<form class="contentContainer container-fluid d-flex align-items-center justify-content-center text-white orbitron" action="/controllers/inscriptionCtrl.php" method="post">
   <fieldset class="row flex-column gap-5 w-100">
      <h1 class="text-center">Inscription</h1>
      <div class="labelsInputsContainer gap-3 d-flex flex-wrap flex-column align-items-center">
         <div class="form-group labelsInputs d-flex flex-column col-10 flex-lg-row justify-content-between">
            <label class="m-2 w-100" for="email">Adresse e-mail :</label>
            <input class="p-2 w-100" value="<?= $email ?? '' ?>" name="email" type="email" id="mail" aria-describedby="emailHelp" placeholder="exemple@mail.com" pattern="<?= REGEX_EMAIL ?>" required>
         </div>
         <div class="form-group labelsInputs d-flex flex-column col-10 flex-lg-row justify-content-between">
            <label class="m-2 w-100" for="pseudo">Pseudo :</label>
            <input class="p-2 w-100" value="<?= $username ?? '' ?>" name="username" type="text" id="username" placeholder="MegaKiller" required>
         </div>
         <div class="form-group labelsInputs d-flex flex-column col-10 flex-lg-row justify-content-between">
            <label class="m-2 w-100" for="password">Mot de passe :</label>
            <input class="p-2 w-100" name="password" type="password" id="password" placeholder="******" required>
         </div>
         <div class="form-group labelsInputs d-flex flex-column col-10 flex-lg-row justify-content-between">
            <label class="m-2 w-100" for="confirmPassword">
               Confirmez le mot de passe :
            </label>
            <input class="p-2 w-100" name="confirmPassword" type="password" id="confirmPassword" placeholder="******" required>
         </div>
      </div>
      <div class="centerButton  d-flex justify-content-center">
         <button type="submit">S'inscrire</button>
         <div class="error">
            <p><?= $errors ?? ''; ?></p>
         </div>
      </div>
   </fieldset>
</form>