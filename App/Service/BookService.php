<?php
namespace App\Service;
/*
require_once "Domain/Book.php";
require_once "ModelView/FullBookModelView.php";
require_once "ModelView/ProfileBookModelView.php";
require_once "ModelView/ShortBookModelView.php";
require_once "Repo/BookDBRepo.php";
require_once "Repo/AuthorDBRepo.php";
*/
use App\Domain\Book;
use App\Domain\BookListRequest;
use App\Service\BookListViewRequest;
use App\Service\BookListViewResponse;
use App\ModelView\FullBookModelView;
use App\ModelView\ProfileBookModelView;
use App\ModelView\ShortBookModelView;
use App\Repo\BookDBRepo;
use App\Repo\AuthorDBRepo;

class BookService
{
    public static  int $pageBookCount = 10;
    public function getFullBookModelView(int $id):FullBookModelView
    {
        $bookMV = new FullBookModelView();
        $bookRepo = new BookDBRepo();
        $book = $bookRepo->getById($id);
        $bookMV->setBook($book);

        $authorRepo = new AuthorDBRepo();
        $author = $authorRepo->getBookAuthors($book->getId())[0];
        $bookMV->setAuthor($author);

        return $bookMV;
    }

    /**
     * @param BookListRequest $request
     * @return ProfileBookModelView[]
     */
    public function getProfileBook(BookListRequest $request):array
    {
        $repo = new BookDBRepo();
        $books = $repo->getBooks($request)->getBookList();
        return Mapper::bookListToProfileBookList($books);
    }


    public function getShortBookModelView(BookListViewRequest  $request):BookListViewResponse
    {
        $repo = new BookDBRepo();

        $bookRequest = new BookListRequest($request->categoryNum,0,
            ($request->pageNum-1)*self::$pageBookCount,self::$pageBookCount);
        $books = $repo->getBooks($bookRequest)->getBookList();

        $response = new BookListViewResponse($request->pageNum,1000,
            Mapper::bookListToShortBookModelViewList($books));
        $bookRequest->count=0;
        $response->pageCount = $repo->Count($bookRequest);
        $response->pageCount/=self::$pageBookCount;
        $response->pageCount+= ($response->pageCount%self::$pageBookCount)==0?0:1;
        //echo "<h1>$response->pageCount</h1>";
        $response->setSuccess(true);
        return $response;
    }

    /**
     * @param int $count
     * @return ProfileBookModelView[]
     */
    public function getLatestBook(int $count):array
    {
        return $this->getProfileBook(new BookListRequest(0,0,0,$count));
    }
}

