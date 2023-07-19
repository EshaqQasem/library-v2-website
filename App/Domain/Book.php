<?php

namespace App\Domain;
class Book
{
    private int $id;
    private string $title;
    private string $description;
    private string $photoPath;
    private \DateTime $add_datetime;

    /**
     * @return \DateTime
     */
    public function getAddDatetime(): \DateTime
    {
        return $this->add_datetime;
    }

    /**
     * @param \DateTime $add_datetime
     */
    public function setAddDatetime(\DateTime $add_datetime): void
    {
        $this->add_datetime = $add_datetime;
    }

    /**
     * @param int $id
     * @param string $title
     * @param string $description
     * @param string $photoPath
     */
    public function __construct(int $id, string $title, string $description, string $photoPath,\DateTime $add_datetime)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->photoPath = $photoPath;
        $this->add_datetime = $add_datetime;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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

    /**
     * @return string
     */
    public function getPhotoPath(): string
    {
        return $this->photoPath;
    }

    /**
     * @param string $photoPath
     */
    public function setPhotoPath(string $photoPath): void
    {
        $this->photoPath = $photoPath;
    }


}




