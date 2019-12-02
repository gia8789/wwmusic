<?php 

defined('FRONTEND') ? null : define('FRONTEND', __DIR__ . '/templates/front/');
defined('BACKEND') ? null : define('BACKEND', __DIR__ . '/templates/back/');

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','wwmusic');

try {
    $pdo = new PDO ("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
}
catch(Exception $e) {
    echo 'Errore nella connessione al database';
    $pdo = false;
}


