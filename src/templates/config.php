<?php 

defined('FRONTEND') ? null : define('FRONTEND', __DIR__ . '/front/');
defined('BACKEND') ? null : define('BACKEND', __DIR__ . '/back/');

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','wwmusic');

$pdo = new PDO ("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);


