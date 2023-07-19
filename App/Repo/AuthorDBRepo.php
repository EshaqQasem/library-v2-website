<?php

namespace App\Repo;
require_once __DIR__."/../Database/MySqlDataAccessLayer.php";
use MyLibrary\DataBases\IDataAccessLayer;
use MyLibrary\DataBases\MySqlDataAccessLayer;
use App\Domain\Author;

class AuthorDBRepo implements IAuthorRepo
{

    private IDataAccessLayer $dbConn;

    public function __construct()
    {
        $this->dbConn = new MySqlDataAccessLayer('library');
    }
    function add(Author $author)
    {
        // TODO: Implement add() method.
    }

    function getById(int $id): Author
    {
        $sql = "select * from auther where a_id=$id";
        $res = $this->dbConn->selectData($sql);
        $des = $res[0]['description']==null?"":$res[0]['description'];
        return new Author($res[0]['a_id'],$res[0]['Name'],$des);
    }

    /**
     * @return Author[]
     */
    function getAll(): array
    {
        $sql = "select * from auther ";
        $res = $this->dbConn->selectData($sql);
        $authors = array();
        foreach ($res as $author)
        {
            $authors[] = new Author($author['a_id'],$author['Name'],($author['description']==null)?"":$author['description']);
        }

        return $authors;
    }

    function writtenBookCount(int $id): int
    {
        $sql = "select count(a_id) from writebook where a_id = $id";
        return $this->dbConn->getValue($sql);
    }

    function getBookAuthors(int $bookId): array
    {
        $sql = "select auther.a_id , auther.Name ,auther.description, writebook.b_id 
                from auther ,writebook 
                where auther.a_id = writebook.a_id
                AND writebook.b_id = $bookId";
        $res = $this->dbConn->selectData($sql);
        $authors = array();
        foreach ($res as $author)
        {
            $des = $author['description']==null?"":$author['description'];
            $authors[] = new Author($author['a_id'],$author['Name'],$des);
        }
        //print_r($authors);
        return $authors;
    }
}