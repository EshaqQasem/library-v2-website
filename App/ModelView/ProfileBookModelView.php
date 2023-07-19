<?php
namespace App\ModelView;
use App\Domain\Book;

class ProfileBookModelView
{
    public string $id;
    public string $photoURL;

    public function setBook(Book $book)
    {
        $this->id = $book->getId();
        $this->photoURL = $book->getPhotoPath();
    }
}