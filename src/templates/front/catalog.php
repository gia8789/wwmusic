<?php
require_once __DIR__ . '/../../functions.php';

if(!isset($_GET['id']))
    HomeList();
else
    //categories will send filter 1, brands will send filter 2
    ListFiltered($_GET['filter'],$_GET['id']);

?>