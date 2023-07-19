<?php

namespace App\Service;
require_once "Repo/CategoryDBRepo.php";

use App\Domain\Category;
use App\Repo\CategoryDBRepo;

class CategoryService
{
    /**
     * @return Category[]
     */
    public function getAllCategories():array
    {
        return (new CategoryDBRepo())->getAll();
    }
}