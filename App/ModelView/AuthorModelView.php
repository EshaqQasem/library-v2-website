<?php

namespace App\ModelView;
use App\ModelView\ProfileBookModelView;
class AuthorModelView
{
    public string $id;
    public string $authorName;
    public string $photoURL;
    public string $aboutAuthor;
    /**
     * @var ProfileBookModelView[]
     */
    public array $writtenBooks;
}