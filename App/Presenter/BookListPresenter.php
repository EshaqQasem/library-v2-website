<?php

namespace App\Presenter;
require_once "../mylibrary/vendor/autoload.php";

use App\ModelView\ShortBookModelView;
use App\Service\BookListViewRequest;
use App\Service\BookService;
use App\View\Viewer;

class BookListPresenter
{
    private int $categoryNum;
    private int $pageNum;

    /**
     * @param int $categoryNum
     * @param int $pageNum
     */
    public function __construct(int $categoryNum, int $pageNum)
    {
        $this->categoryNum = $categoryNum;
        $this->pageNum = $pageNum;
    }

    public function display()
    {
        $bookService = new BookService();

        $response =  $bookService->getShortBookModelView(new BookListViewRequest($this->categoryNum,$this->pageNum));

        if($response->isSuccess())
        {
            Viewer::viewPagesList($response->pageCount,$response->pageNum,$this->categoryNum);
            $bookList = $response->bookList;
            foreach ($bookList as $book)
            {
                Viewer::viewShortBookInfo($book);
            }
            Viewer::viewPagesList($response->pageCount,$response->pageNum,$this->categoryNum);
        }else{
            echo $response->getErrorMessage();
        }
    }

    /**
     * @return int
     */
    public function getCategoryNum(): int
    {
        return $this->categoryNum;
    }

    /**
     * @param int $categoryNum
     */
    public function setCategoryNum(int $categoryNum): void
    {
        $this->categoryNum = $categoryNum;
    }

    /**
     * @return int
     */
    public function getPageNum(): int
    {
        return $this->pageNum;
    }

    /**
     * @param int $pageNum
     */
    public function setPageNum(int $pageNum): void
    {
        $this->pageNum = $pageNum;
    }




}



