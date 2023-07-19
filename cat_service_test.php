<?php
require_once "Service/CategoryService.php";
use Service\CategoryService;

$ser = new CategoryService();
$res = $ser->getAllCategories();
print_r($res);
