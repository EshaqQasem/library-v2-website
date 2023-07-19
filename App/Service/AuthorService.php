<?php

namespace App\Service;
require_once "Domain/Book.php";
require_once "ModelView/AuthorModelView.php";
require_once "Repo/AuthorDBRepo.php";
require_once "BookService.php";

use App\Domain\BookListRequest;
use App\ModelView\AuthorModelView;
use App\Repo\AuthorDBRepo;

class AuthorService
{

    public function getAuthorModelView(int $authorId):AuthorModelView
    {
        $authorMV = new AuthorModelView();

        $repo = new AuthorDBRepo();
        $author = $repo->getById($authorId);

        $authorMV->id = $author->getId();
        $authorMV->authorName = $author->getFullName();
        $authorMV->aboutAuthor = $author->getDescription();

        $bookService = new BookService();
        $authorMV->writtenBooks = $bookService->getProfileBook(
            new BookListRequest(0,$author->getId(),0,0));

        return $authorMV;
    }
}