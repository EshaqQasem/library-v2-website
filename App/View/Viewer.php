<?php

namespace App\View;

use App\ModelView\ShortBookModelView;
require_once "../mylibrary/Views/Anchor.php";
require_once "../mylibrary/Views/URL.php";

//require_once "../mylibrary/vendor/autoload.php";
use MyLibrary\Views\Anchor;
use MyLibrary\Views\URL;
use App\Service\BookService;

class Viewer
{
    public static function viewPagesList(int $pageCount,int $pageNum,int $category)
    {?>
        <div id="booksScroll" class="header" >
            <div>
                <?php


                echo '<p>'.' عرض من ';
                echo BookService::$pageBookCount*($pageNum-1)+1 .' - '. 1000;
                echo ' من أصل ';
                echo $pageCount*BookService::$pageBookCount .' كتاب '.'</p>';

                ?>

            </div>

            <div class="pages">
                <ul>
                    <?php

                    for($i=1;$i <=$pageCount;$i++)
                    {
                        echo '<li ';
                        echo ($i == $pageNum)?'style="color:white;background-color:rgb(255, 100, 0);"':'';
                        echo '><a href="books.php?page='.$i.'&category='.$category.'"';
                        echo ($i== $pageNum)?'style="color:white"':'';
                        echo '>'.$i.'</a></li>';
                    }

                    ?>

                </ul>
            </div>
        </div>

    <?php
    }
    public static function viewShortBookInfo(ShortBookModelView $modelView)
    {
        ?>
         <div class="abook">
                        <div class="imgdiv">
                            <img  src=<?php echo "img/$modelView->id.svg";?> >
                        </div>
                        <div class="aboutBook">
                            <div class="title">
                                <?php
                                    $url = new URL("books.php?");
                                    $url->addProperty("book",$modelView->id);
                                    $anchor = new Anchor();
                                    $anchor->setURL($url);
                                    $anchor->append($modelView->bookTitle);

                                    echo $anchor->toString();

                                ?>

                            </div>
                            <div class="auther">
                                <?php
                                $url2 = new URL("author.php?");
                                $url2->addProperty("author",$modelView->authorId);
                                $anchor2 = new Anchor();
                                $anchor2->setURL($url2);
                                $anchor2->append($modelView->authorName);

                                echo $anchor2->toString();
                                ?>

                            </div>
                            <hr>
                            <p>
                                <?php echo $modelView->bookDesc;?>
                            </p>
                            <div class="moredetails" >
                                <?=$anchor->innerHtml(" ")->toString();?>
                            شاهد التفاصيل
                                </a>

                            </div>
                        </div>
                    </div>
        <?php
    }
}