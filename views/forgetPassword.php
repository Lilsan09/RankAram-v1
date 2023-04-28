<?php
if (SessionFlash::exist()) {
?>
   <div class="alert alert-dismissible fade show text-white" role="alert">
      <strong><?= SessionFlash::get() ?></strong>
      <button type="button" class="btn-close btn-close-white closeAlertBtn" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
<?php } ?>

<form class="contentContainer container-fluid d-flex align-items-center justify-content-center text-white" method="post">
   <fieldset class="row flex-column gap-5">
      <h1 class="text-white text-center">Mot de passe oublié</h1>
      <div class="labelsInputsContainer gap-5 d-flex flex-wrap flex-column h-100 align-items-center">
         <div class="form-group labelsInputs d-flex flex-column col-10 col-lg-8 orbitron">
            <label class="m-2 w-100" for="email">Adresse e-mail :</label>
            <input class="p-2 w-100" value="<?= $email ?? '' ?>" name="email" type="email" id="mail" aria-describedby="emailHelp" placeholder="exemple@mail.com" pattern="<?= REGEX_EMAIL ?>" required>
         </div>
      </div>
      <div class="centerButton d-flex justify-content-center">
         <button type="submit">Envoyer</button>
         <div class="error">
            <p><?= $errors ?? ''; ?></p>
         </div>
      </div>
      <p class="text-center orbitron text">Vous n'êtes pas inscrit? <br> Alors inscrivez vous <a class=" text-decoration-none" href="/controllers/inscriptionCtrl.php">ici</a> et commencez votre ascension maintenant !</p>
   </fieldset>
</form>