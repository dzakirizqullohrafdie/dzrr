<?php

require_once 'app/controllers/BeritaController.php';
$controller = new BeritaController();
$aksi = isset($_GET['aksi'])
? $_GET['aksi']
: 'index';
switch($aksi){
default:
$controller->index();
break;

}