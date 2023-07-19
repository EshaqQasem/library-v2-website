<?php
require_once "vendor/autoload.php";
use App\Service\BookService;
$bookService = new BookService();
/*$bookProfile = $bookService->getShortBookModelView(new \Domain\BookListRequest(0,0,0,10));
foreach ($bookProfile as $book)
{
    echo $book->id ." ".$book->photoURL.$book->bookTitle." ".$book->authorName."<br>";
}
*/
$fBookMV = $bookService->getFullBookModelView(10);
var_dump($fBookMV);