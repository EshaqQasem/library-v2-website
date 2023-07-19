<?php

namespace App\Domain;

class Category
{
    private string $id;
    private string $name;
    private int $bookCount;

    /**
     * @return int
     */
    public function getBookCount(): int
    {
        return $this->bookCount;
    }

    /**
     * @param int $bookCount
     */
    public function setBookCount(int $bookCount): void
    {
        $this->bookCount = $bookCount;
    }

    /**
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name,int $bookCount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->bookCount = $bookCount;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


}