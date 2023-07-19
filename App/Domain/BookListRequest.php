<?php

namespace App\Domain;

class BookListRequest
{
    public int $categoryNum=0;
    public int $authorNum=0;
    public int $offset=0;
    public int $count=0;

    /**
     * @param int $categoryNum
     * @param int $authorNum
     * @param int $offset
     * @param int $count
     */
    public function __construct(int $categoryNum, int $authorNum, int $offset, int $count)
    {
        $this->categoryNum = $categoryNum;
        $this->authorNum = $authorNum;
        $this->offset = $offset;
        $this->count = $count;
    }


}