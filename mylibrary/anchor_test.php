<?php
require_once "vendor/autoload.php";
use MyLibrary\Views\{URL,Anchor};
$url = new URL("books.php?");
$url->addProperty("book",5);
$anchor = new Anchor();
$anchor->setURL($url);
$anchor->append("hhhh");

echo $anchor->toString();
