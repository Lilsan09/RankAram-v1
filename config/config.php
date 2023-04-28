<?php

// Session start pour les Sessions flash
session_start();

require_once(__DIR__ . '/../helpers/SessionFlash.php');

// Déclaration des Regex
define('REGEX_EMAIL', "^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");

define('REGEX_ZIPCODE', "^[0-9]{5}$");

define('REGEX_NO_NUMBER', '^[A-Za-zéèêëàâäôöûüç\' ]+$');

// regex pour les noms d'utilisateur
define('REGEX_USERNAME', '^[A-Za-zéèêëàâäôöûüç\' ]+$');

// BASE DE DONNEES
define('DSN', 'mysql:host=localhost;dbname=rankaram;charset=utf8;port=3306');

define('USER', 'root');
define('PWD', '');

define('SITE_NAME', 'RankAram');
define('EMAIL', 'rankaram@gmail.com');

define ('SECRET_KEY', 'fsdh&éé"&"&éff444dsf54q6fs`dsffsdqhg:::!dsq');