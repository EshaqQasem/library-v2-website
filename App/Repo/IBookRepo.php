<?php

namespace App\Repo;
use App\Domain\Book;
use App\Domain\BookListRequest;
use App\Domain\BookListResponse;

//require_once "Domain/Book.php";


interface IBookRepo
{
    function getById(string $id):Book;
    function getBooks(BookListRequest $bookListRequest):BookListResponse;
    function addBook(Book $book);
    function deleteBook(string $id);
    function updateBook(string $id,Book $book);
}

