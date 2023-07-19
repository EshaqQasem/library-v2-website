<?php

namespace App\Repo;

use App\Domain\Category;
interface ICategoryRepo
{
    function Add(Category $category);
    function getById(int $id):Category;
    function getByName(string $name):Category;
    function categoryBookCount(int $catId):int;
    function getAll():array;
}