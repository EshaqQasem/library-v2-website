<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>مؤسسة هنداوي</title>
    <link rel="stylesheet" href="stylesheets/headerfooter.css">
    <link rel="stylesheet" href="stylesheets/container.css" id="css1" />
    <script src="scripts/jquery-1.11.1.min.js"></script>
    <script src="scripts/scripts.js">
    </script>
</head>
<body>
    <?php 
    require_once "vendor\autoload.php";
    require_once "header.html";?>

    <div class="container">
        <?php include('siteTitle.php');?>
        <main>
            <?php include('bookscatagoriesside.php');?>
            <div id= "bookscontainer"; class="bookscontainer">
                <?php
                    // require_once "vendor\autoload.php";
                    use App\Presenter\BookListPresenter;

                    $categoryNum = $_GET['category'] ?? 0;
                    $pageNum = $_GET['page'] ?? 1;

                    $presenter = new BookListPresenter($categoryNum,$pageNum);
                    $presenter->display();




                ?>
            </div>
        </main>
    </div>


    <?php require_once "footer.html";?>
</body>
</html>
