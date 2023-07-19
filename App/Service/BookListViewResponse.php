<?php

namespace App\Service;

use App\ModelView\ShortBookModelView;

class BookListViewResponse{

    private bool $success;

    /**
     * @param bool $success
     */
    public function setSuccess(bool $success): void
    {
        $this->success = $success;
    }
    private string $errorMessage;
    public int $pageNum;
    public int $pageCount;
    /**
     * @var ShortBookModelView[]
     */
    public array $bookList;

    /**
     * @param int $pageNum
     * @param int $pageCount
     * @param ShortBookModelView[] $bookList
     */
    public function __construct(int $pageNum, int $pageCount, array $bookList)
    {
        $this->pageNum = $pageNum;
        $this->pageCount = $pageCount;
        $this->bookList = $bookList;
    }

    public function isSuccess():bool{
        return $this->success;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage(string $errorMessage): void
    {
        $this->errorMessage = $errorMessage;
    }

}