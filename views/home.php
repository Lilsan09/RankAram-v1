<?php
if (SessionFlash::exist()) {
?>
   <div class="alert alert-dismissible fade show text-white" role="alert">
      <strong><?= SessionFlash::get() ?></strong>
      <button type="button" class="btn-close btn-close-white closeAlertBtn" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
<?php } ?>

<main>
   <div class="home container-fluid">
      <div class="mainContainer row align-content-center align-items-center">
         <div class="col-11 col-lg-8 my-3 mt-md-0 py-4 windowBlur justify-content-lg-evenly justify-content-center homeContent">
            <h1 class="title">Bienvenue sur Rank-Aram</h1>
            <div class="homeTextContainer d-flex align-items-center justify-content-center">
               <p class="homeText">
                  Inscrit toi vite et <a href="">lie ton compte Riot Game</a> pour commencer
                  à grind le ladder, et devenir le plus légendaire des
                  joueurs d'ARAM !
               </p>
               <p class="homeText">
                  Si tu est déjà inscrit, alors connecte toi <a href="/controllers/">ici</a> pour suivre
                  ton évolution
               </p>
            </div>
         </div>
         <div class="windowBlur rankVisual col-11 col-lg-2">
            <div class="allRankVisual"></div>
         </div>
      </div>
   </div>
</main>