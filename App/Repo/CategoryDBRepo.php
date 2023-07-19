<?php

namespace App\Repo;
require_once __DIR__."/../Database/MySqlDataAccessLayer.php";
use MyLibrary\DataBases\IDataAccessLayer;
use MyLibrary\DataBases\MySqlDataAccessLayer;
use App\Domain\Category;



class CategoryDBRepo implements ICategoryRepo
{

    private IDataAccessLayer $dbConn;

    public function __construct()
    {
        $this->dbConn = new MySqlDataAccessLayer('library');
    }

    function Add(Category $category)
    {
        // TODO: Implement Add() method.
    }

    function getById(int $id): Category
    {
        $sql = "SELECT * from category where c_num = $id";
        $res = $this->dbConn->selectData($sql);
        return new Category($res[0]['c_num'],$res[0]['name'],$this->categoryBookCount($res[0]['c_num']));
    }

    function getByName(string $name): Category
    {
        $sql = "SELECT * from category where name = \'$name \'";
        $res = $this->dbConn->selectData($sql);
        return new Category($res[0]['c_num'],$res[0]['name'],$this->categoryBookCount($res[0]['c_num']));
    }

    function getAll(): array
    {
        $sql = "SELECT * from category ";
        $res = $this->dbConn->selectData($sql);
        $cats = array();
        foreach ($res as $cat)
        {
            $cats[] = new Category($cat['c_num'],$cat['name'],$this->categoryBookCount($res[0]['c_num']));
        }
        return $cats;
    }

    function categoryBookCount(int $catId): int
    {
        $sql = "select count(*) from book,bookcategories ";
        $sql.= ($catId==0)?" where book.b_id=bookcategories.b_id":" where book.b_id=bookcategories.b_id AND  bookcategories.c_num =$catId";
        return $this->dbConn->getValue($sql);
    }
}