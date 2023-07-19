<?php
require_once "Repo/BookDBRepo.php";
$br = new \Repo\BookDBRepo();
/*$book = $br->getById('111');
try {
    $res = $br->getBooks(new Domain\BookListRequest(1, 5, 0, 10));
    $books = $res->getBookList();

}catch (PDOException $ex)
{
    echo $ex->getMessage();
}
print_r($books);
*/
$books = $br->getBooks(new \Domain\BookListRequest(0,0,0,10))->getBookList();
foreach ($books as $book)
{
    echo $book->getId()." ".$book->getTitle()."<br>";
}