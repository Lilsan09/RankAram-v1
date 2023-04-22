<?php
if (SessionFlash::exist()) {
?>
   <div class="alert" role="alert">
      <strong><?= SessionFlash::get() ?></strong>
      <button type="button" class="btn-close closeAlertBtn" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>

<?php } ?>
<div class="contentContainer">
   <div class="formContainer">
      <h1 class="text-white">Connexion</h1>
      <form class="connexionForm" action="/controllers/connexionCtrl.php" method="post">
         <div class="labelsInputsContainer">
            <div class="labelsInputs">
               <label for="email">Adresse e-mail :</label>
               <input value="<?= $email ?? '' ?>" name="email" type="email" id="mail" aria-describedby="emailHelp" placeholder="exemple@mail.com" pattern="<?= REGEX_EMAIL ?>" required>
            </div>
            <div class="labelsInputs">
               <label for="password">Mot de passe :</label>
               <input name="password" type="password" id="password" placeholder="******" required>
            </div>
         </div>
         <div class="centerButton">
            <button type="submit">Se connecter</button>
            <div class="error"><p><?= $errors ?? ''; ?></p></div>
         </div>
      </form>
   </div>
</div>