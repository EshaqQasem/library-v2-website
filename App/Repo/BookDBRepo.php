<?php

namespace App\Repo;
require_once __DIR__."/../Database/MySqlDataAccessLayer.php";
use MyLibrary\DataBases\IDataAccessLayer;
use MyLibrary\DataBases\MySqlDataAccessLayer;
/*
require_once "../mylibrary/MySqlDataAccessLayer.php";
require_once  "Domain/Book.php";
require_once "IBookRepo.php";
*/
use App\Domain\Book;
use App\Domain\BookListRequest;
use App\Domain\BookListResponse;
use App\Domain\BookMapper;


class BookDBRepo implements IBookRepo
{

    private string $tableName = 'book';
    private IDataAccessLayer $db;

    /**
     * @return \IDataAccessLayer
     */
    public function getDb(): IDataAccessLayer
    {
        return $this->db;
    }

    /**
     * @param IDataAccessLayer $db
     */
    public function setDb(IDataAccessLayer $db): void
    {
        $this->db = $db;
    }

    /**
     * @param \IDataAccessLayer $db
     */
    public function __construct()
    {
        $this->db = new MySqlDataAccessLayer('library');
    }

    function getById(string $id):Book
    {
           $this->db->connect();
           $sql = "select * from $this->tableName where b_id = $id";
           $res  = $this->db->selectData($sql);
          return BookMapper::convertDBBookToBook($res[0]);
    }

    function getBooks(BookListRequest $bookListRequest): BookListResponse
    {
        $response = new BookListResponse;
        $this->db->connect();
        $sql = BookDBRepo::createSQLFrom($bookListRequest);
        //echo $sql;
        $res = $this->db->selectData($sql);
        $response->setBookList(BookMapper::convertDBBookArrToBookArr($res));
        return $response;
    }

    function addBook(Book $book)
    {
        // TODO: Implement addBook() method.
    }

    function deleteBook(string $id)
    {
        // TODO: Implement deleteBook() method.
    }

    function updateBook(string $id, Book $book)
    {
        // TODO: Implement updateBook() method.
    }

    public function Count(BookListRequest $bookListRequest):int
    {
        $this->db->connect();
        $sql = BookDBRepo::createSQLFrom2($bookListRequest);
        //echo $sql;
        return $this->db->getValue($sql);
    }
    private static function createSQLFrom(BookListRequest $request):string{
        $sql = array();
        $sql['select'] = "SELECT book.b_id,book.title,book.description,book.add_date ";
        $sql['from'] = " from book ";
        $sql['where'] = "where ";
        $sql['order'] = " order by add_date desc ";
        $sql['limit'] ="";
        if($request->categoryNum!=0){
            $sql['select'].= ",bookcategories.c_num ";
            $sql['from'].=",bookcategories ";
            $sql['where'].=" book.b_id=bookcategories.b_id  AND bookcategories.c_num=$request->categoryNum ";
        }

        if($request->authorNum!=0){
            $sql['select'].= ",writebook.a_id ";
            $sql['from'].=",writebook ";
            $sql['where'].=($request->categoryNum!=0?"AND":" ")." book.b_id=writebook.b_id AND  writebook.a_id=$request->authorNum ";
        }

        if($request->count!=0){
            $sql['limit'] = "limit $request->offset,$request->count";
        }

        return $sql['select'].$sql['from'].($sql['where']=="where "?"":$sql['where']).$sql['order'].$sql['limit'];
    }

    private static function createSQLFrom2(BookListRequest $request):string{
        $sql = array();
        $sql['select'] = "SELECT count(*) ";
        $sql['from'] = " from book ";
        $sql['where'] = "where ";
        $sql['order'] = " order by add_date desc ";
        $sql['limit'] ="";
        if($request->categoryNum!=0){
            $sql['select'].= ",bookcategories.c_num ";
            $sql['from'].=",bookcategories ";
            $sql['where'].=" book.b_id=bookcategories.b_id  AND bookcategories.c_num=$request->categoryNum ";
        }

        if($request->authorNum!=0){
            $sql['select'].= ",writebook.a_id ";
            $sql['from'].=",writebook ";
            $sql['where'].=($request->categoryNum!=0?"AND":" ")." book.b_id=writebook.b_id AND  writebook.a_id=$request->authorNum ";
        }

        if($request->count!=0){
            $sql['limit'] = "limit $request->offset,$request->count";
        }

        return $sql['select'].$sql['from'].($sql['where']=="where "?"":$sql['where']).$sql['order'].$sql['limit'];
    }
}