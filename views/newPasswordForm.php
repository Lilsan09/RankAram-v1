<?php
if (SessionFlash::exist()) {
?>
   <div class="alert text-white" role="alert">
      <strong><?= SessionFlash::get() ?></strong>
      <button type="button" class="btn-close btn-close-white closeAlertBtn" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>

<?php } ?>
<form class="contentContainer container-fluid d-flex align-items-center justify-content-center text-white" action="/controllers/changePasswordCtrl.php" method="POST">
   <fieldset class="row flex-column gap-5">
      <h1 class="text-white text-center">Nouveau mot de passe</h1>
      <div class="labelsInputsContainer gap-5 d-flex flex-wrap flex-column h-100 align-items-center">
         <div class="form-group labelsInputs d-flex flex-wrap flex-column col-10 col-lg-8 orbitron">
            <label class="m-2 w-100" for="password">Nouveau mot de passe</label>
            <input class="p-2 w-100" name="password" type="password" id="password" placeholder="******" required>
            <input type="hidden" name="token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
         </div>
         <div class="form-group labelsInputs d-flex flex-wrap flex-column col-10 col-lg-8 orbitron">
            <label class="m-2 w-100" for="confirmPassword">Confirmez le nouveau mot de passe</label>
            <input class="p-2 w-100" name="confirmPassword" type="password" id="password" placeholder="******" required>
         </div>
      </div>
      <div class="centerButton d-flex justify-content-center">
         <button type="submit">Envoyer</button>
         <div class="error">
            <p><?= $errors ?? ''; ?></p>
         </div>
      </div>
   </fieldset>
</form>