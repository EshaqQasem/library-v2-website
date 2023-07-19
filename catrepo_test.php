<?php
require_once "Repo/CategoryDBRepo.php";
use Repo\CategoryDBRepo;

$repo = new CategoryDBRepo();
echo $repo->categoryBookCount(1);
