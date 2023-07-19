<?php require_once "vendor\autoload.php"; ?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>مؤسسة هنداوي</title>
    <link rel="stylesheet" href="stylesheets/headerfooter.css">
    <link rel="stylesheet" href="stylesheets/home.css" id="css1" />
    <script src="scripts/jquery-1.11.1.min.js"></script>
    <script src="scripts/scripts.js">
    </script>
</head>
<body>
<?php require_once "header.html";?>

<!--<script>
    $('link[id="css1"').attr('href','stylesheets/home.css');
    $('#a1').attr('class','active');
</script>
-->
<div class="container">
    <main>
        <div class="aboutus">
            <div>
                <h3> موسسة هنداوي</h3>
            </div>
            <div>
                «مؤسسة هنداوي» مؤسسة غير هادفة للربح، تهدف إلى نشر المعرفة والثقافة، وغرس حب القراءة بين المتحدثين باللغة العربية.
            </div>
        </div>
        <div class="latesBookscon">
            <div>
                <h3> احدث الكتب</h3>
            </div>
            <div class="latesBooks">
                <?php
                require_once "App/Service/BookService.php";
                require_once "vendor/autoload.php";

                use App\Service\BookService;

                $bookService = new BookService();
                $bookProfiles = $bookService->getLatestBook(10);

                foreach ($bookProfiles as $profile)
                {
                    echo "<a href=\"books.php?book_id=$profile->id\"><img class=\"latesBooksImg\" src='img/$profile->photoURL.svg'></a>";

                }

                ?>
            </div>
        </div>
        <div class="phoneApp">
            <div>
                <h3>تطبيق هنداوي على الهاتف الجوال</h3>
            </div>
            <div>
                <p class="app">                 أضف إلى مكتبتك العديد من الكتب المتميزة

                    والنادرة مجانًا من خلال تطبيق «هنداوي»‏
                    الذي صُمم ليعطي قرَّاء اللغة العربية تجربة فريدة من نوعها مع القراءة.
                    يحتوي تطبيق «هنداوي كتب»‏ على عددٍ كبيرٍ من المؤلفات الفريدة،
                    سواء العربية أو المترجمة، لكبار الكتَّاب والأدباء؛
                    مثل: طه حسين، وعباس محمود العقاد، وغوستاف لوبون، وأليس مونرو
                    الحائزة على جائزة نوبل في الآداب، وغيرهم الكثير.
                    كما يتميز التطبيق بمحتواه الثري من روايات وقصص وكتب في
                    العلوم والسياسة والاقتصاد والفنون، وغيرها من المجالات.
                </p>
            </div>

        </div>

    </main>
</div>


<?php require_once "footer.html";?>
</body>
</html>
