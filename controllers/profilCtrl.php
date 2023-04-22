<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/SessionFlash.php');


// appel des vues
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/profil.php');
include(__DIR__ . '/../views/templates/footer.php');