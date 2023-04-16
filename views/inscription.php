<form class="bgGlobal container-fluid d-flex align-items-center justify-content-center" method="POST">
   <fieldset class="row justify-content-center my-4 text-light">
      <legend class="text-center mt-4">S'inscrire</legend>
         <div class="form-group col-10 col-lg-9 m-3">
            <label for="email" class="form-label mt-4">Adresse Mail</label>
            <input value="<?= $email ?? '' ?>" name="email" type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="exemple@mail.com" pattern="<?= REGEX_EMAIL ?>" required>
            <p><?= $errors['email'] ?? ''; ?></p>
         </div>
         <div class="form-group col-10 col-lg-9 m-3">
            <label for="username" class="form-label mt-4">Pseudo</label>
            <input value="<?= $username ?? '' ?>" name="username" type="text" class="form-control" id="username" placeholder="MegaKiller" required>
            <p><?= $errors['username'] ?? ''; ?></p>
         </div>
         <div class="form-group col-10 col-lg-9 m-3">
            <label for="password" class="form-label mt-4 ">Mot de passe</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="******" required>
            <p><?= $errors['testPassword'] ?? '' ?></p>
         </div>
         <div class="form-group col-10 col-lg-9 m-3">
            <label for="confirmPassword" class="form-label mt-4 ">Confirmer le mot de passe</label>
            <input name="confirmPassword" type="password" class="form-control" id="confirmPassword" placeholder="******" required>
         </div>
         <button type="submit" class="btn col-4 col-lg-3 m-lg-4 m-3 text-light">Inscription</button>
   </fieldset>
</form>