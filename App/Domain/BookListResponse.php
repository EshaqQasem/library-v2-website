<?php

namespace App\Domain;

class BookListResponse{
    private bool $success;
    private string $message;
    private int $left;
    private array $bookList;

    /**
     * @return Book[]
     */
    public function getBookList(): array
    {
        return $this->bookList;
    }

    /**
     * @param array<Book> $bookList
     */
    public function setBookList(array $bookList): void
    {
        $this->bookList = $bookList;
    }
    /**
     * @param bool $success
     * @param string $message
     * @param int $left
     */
    public function __construct()
    {/*
        $this->success = $success;
        $this->message = $message;
        $this->left = $left;
    */
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @param bool $success
     */
    public function setSuccess(bool $success): void
    {
        $this->success = $success;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getLeft(): int
    {
        return $this->left;
    }

    /**
     * @param int $left
     */
    public function setLeft(int $left): void
    {
        $this->left = $left;
    }




}