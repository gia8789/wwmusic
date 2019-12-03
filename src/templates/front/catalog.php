<?php
require_once __DIR__ . '/../../functions.php';

if(!isset($_GET['id']))
    HomeList();
else
    ListFiltered($_GET['filter'],$_GET['id']);

?>