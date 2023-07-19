<?php
    function print_array(&$array)
    {
        foreach($array as $item)
        {
            echo " ".$item." ";
        }
    }

    function print_indexed_arr(&$array)
    {
        foreach($array as $key=>$item)
        {
            echo " ".$key ." = ".$item." ";
        }
    }