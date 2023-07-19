<?php

namespace App\Service;

class BookListViewRequest
{
    public int $categoryNum;
    public int $pageNum;

    /**
     * @param int $categoryNum
     * @param int $pageNum
     */
    public function __construct(int $categoryNum, int $pageNum)
    {
        $this->categoryNum = $categoryNum;
        $this->pageNum = $pageNum;
    }

}