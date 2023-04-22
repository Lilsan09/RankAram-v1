<div class="contentContainer">
   <div class="formContainer">
      <h1>Inscription</h1>
      <form action="/controllers/inscriptionCtrl.php" method="post">
         <div class="labelsInputsContainer">
            <div class="labelsInputs">
               <label for="email">Adresse e-mail :</label>
               <input value="<?= $email ?? '' ?>" name="email" type="email" id="mail" aria-describedby="emailHelp" placeholder="exemple@mail.com" pattern="<?= REGEX_EMAIL ?>" required>
            </div>
            <div class="labelsInputs">
               <label for="pseudo">Pseudo :</label>
               <input value="<?= $username ?? '' ?>" name="username" type="text" id="username" placeholder="MegaKiller" required>
            </div>
            <div class="labelsInputs">
               <label for="password">Mot de passe :</label>
               <input name="password" type="password" id="password" placeholder="******" required>
            </div>
            <div class="labelsInputs">
               <label for="confirmPassword">
                  Confirmez le mot de passe :
               </label>
               <input name="confirmPassword" type="password" id="confirmPassword" placeholder="******" required>
            </div>
         </div>
         <div class="centerButton">
            <button type="submit">S'inscrire</button>
            <div class="error"><p><?= $errors ?? ''; ?></p></div>
         </div>
      </form>
   </div>
</div>