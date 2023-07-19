<?php

namespace App\Service;
/*require_once "Domain/Book.php";
require_once "ModelView/ProfileBookModelView.php";
require_once "ModelView/ShortBookModelView.php";
require_once "Repo/AuthorDBRepo.php";
*/
use App\Domain\Book;
use App\ModelView\ProfileBookModelView;
use App\ModelView\ShortBookModelView;
use App\Repo\AuthorDBRepo;

class Mapper
{
    public static function bookToProfileBookMV(Book $book):ProfileBookModelView
    {
        $profile = new ProfileBookModelView();
        $profile->setBook($book);
        return $profile;
    }

    /**
     * @param Book[] $books
     * @return ProfileBookModelView[]
     */
    public static function bookListToProfileBookList(array $books):array
    {
        $profiles = array();
        foreach ($books as $book)
        {
            $profiles[] = Mapper::bookToProfileBookMV($book);
        }
        return $profiles;
    }

    /**
     * @param array $books
     * @return ShortBookModelView[]
     */
    public static function bookListToShortBookModelViewList(array $books):array
    {
        $shBookList = array();
        foreach ($books as $book)
        {
            $shBookList[] = Mapper::bookToShortBookMV($book);
        }
        return $shBookList;
    }

    private static function bookToShortBookMV(Book $book):ShortBookModelView
    {
        $shBookMV = new ShortBookModelView();
        $shBookMV->setBook($book);

        $authorRepo = new AuthorDBRepo();
        $author = $authorRepo->getBookAuthors($book->getId());
        $shBookMV->setAuthor($author[0]);

        return $shBookMV;
    }
}