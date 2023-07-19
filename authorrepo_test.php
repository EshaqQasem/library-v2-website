<?php
require_once "Repo/AuthorDBRepo.php";
//require_once "Domain/Author.php";
//use Domain\Author;
use Repo\AuthorDBRepo;

$repo = new AuthorDBRepo();
//$author = $repo->getById(1);
//var_dump($author);
//$authors = $repo->getAll();
//print_r($authors);
/*
foreach ($authors as $author)
{
    echo $author->getId()." ".$author->getFullName()." ".$author->getDescription()."<br>";
}
*/
print_r( $repo->getBookAuthors(6));