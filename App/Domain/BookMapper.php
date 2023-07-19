<?php

namespace App\Domain;

class BookMapper{
    public static function convertDBBookToBook(array $ass_arr):Book{
        $dt = date_create_from_format('Y-m-d H:i:s',$ass_arr['add_date']);
        return  new Book($ass_arr['b_id'],$ass_arr['title'],$ass_arr['description'],$ass_arr['b_id'],$dt);
    }
    public static function convertDBBookArrToBookArr(array $table):array{
        $book_arr = array();
        foreach ($table as $row)
        {
            $book_arr[] = BookMapper::convertDBBookToBook($row);
        }
        return $book_arr;
    }
}