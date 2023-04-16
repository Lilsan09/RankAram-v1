<!doctype html>
<html lang="fr">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- CSS -->
   <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="/public/assets/css/style.css">
   
   <!-- SCRIPT -->

   <title>Rank Aram</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
<header>
      <nav class="navbar navbar-dark navbar-expand-lg orbitron">
         <div class="container-fluid p-2">
            <a class="navbar-brand rankAramColor" href="/controllers/homeCtrl.php">Rank Aram
               <span class="visually-hidden">(current)</span>
            </a>
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon" ></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarColor02">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link text-white" href="/controllers/ladderCtrl.php">Ladder</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link text-white" href="/controllers/tierListCtrl.php">Tier List</a>
                  </li>
                  
               </ul>
               <?php if (isset($_SESSION['user'])) { ?>
                  <ul class="navbar-nav align-self-end me-5">
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mon compte</a>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="/controllers/profilUserCtrl.php">Profil</a>
                           <a class="dropdown-item" href="/controllers/deconnexionCtrl.php">Deconnexion</a>
                           <?php if ($_SESSION['user']->role == 1) { ?>
                              <a class="dropdown-item text-dark" href="/controllers/admin/dashboardCtrl.php">Dashboard</a>
                        </div>
                     </li>
                  <?php }
                        } else { ?>
                  <li class="nav-item list-unstyled text-secondary me-5">
                     <a class="nav-link text-decoration-none text-white" href="/controllers/connexionCtrl.php">Connexion</a>
                  </li>
               <?php } ?>
                  </ul>


            </div>
         </div>
      </nav>
   </header>