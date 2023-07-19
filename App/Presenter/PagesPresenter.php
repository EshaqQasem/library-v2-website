<?php

namespace App\Presenter;

class PagesPresenter
{
    private int $pageCount;
    private int $pageNum;

    /**
     * @param int $pageCount
     * @param int $pageNum
     */
    public function __construct(int $pageCount, int $pageNum)
    {
        $this->pageCount = $pageCount;
        $this->pageNum = $pageNum;
    }

    public function disply()
    {

    }

}