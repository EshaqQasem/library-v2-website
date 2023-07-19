<?php
require_once "Service/AuthorService.php";
use Service\AuthorService;
$autser = new AuthorService();
$amv = $autser->getAuthorModelView(2);
var_dump($amv);