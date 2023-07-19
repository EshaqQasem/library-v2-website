<?php

namespace App\Repo;
use App\Domain\Author;
interface IAuthorRepo
{
    function add(Author $author);
    function getById(int $id):Author;
    /**
     * @return Author[]
     */
    function getAll():array;
    function writtenBookCount(int $id):int;
    /**
     * @return Author[]
     */
    function getBookAuthors(int $bookId):array;
}