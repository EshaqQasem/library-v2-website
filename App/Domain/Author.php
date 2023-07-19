<?php

namespace App\Domain;

class Author
{
    private int $id;
    private string $fullName;
    private string $description;

    /**
     * @param int $id
     * @param string $fullName
     * @param string $description
     */
    public function __construct(int $id, string $fullName, string $description="")
    {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->description = $description;

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

}