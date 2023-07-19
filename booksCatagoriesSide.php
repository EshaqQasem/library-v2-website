<?php

?>
<aside>
            <label><h3>موضوعات الكتب</h3></label>
            <ul>
                
                <?php
                
                    use App\Repo\CategoryDBRepo;
                    // require_once(__DIR__.'/App/Repo/CategoryDBRepo.php');
                    use MyLibrary\Views\{Anchor,URL};
                    $repo = new CategoryDBRepo();
                    $categories =  $repo->getAll();


                    $count = $repo->categoryBookCount(0);

                    $href="books.php?";
                   
                    $activeCatCount=0;
                   
                    $active_cat_name="كل الكتب";
                    
                    echo "<li><a href=$href ";
                    echo ">كل الكتب  ";
                    echo   '<span class="count">'.$count;
                    echo '</span> </a> </li> ';
                    /*

                            if($catagory==0)
                            {
                            echo 'class="active"';
                            $activeCatCount=$count;
                            }
                    echo '>كل الكتب

                               <span class="count">'.$count;
                    echo '</span> </a> </li> ';

                    $sql="select * from category";
                    $res=mysqli_query($con,$sql);
                    if($res === false)
                    {
                        die('حدث خطا');
                    }
*/
                    foreach ($categories as $category)
                    {/*
                            echo '<li>
                                <a href="'.$href.$c_num.'"';
                                if( $catagory==$c_num)
                                {
                                echo 'class="active"';
                                $activeCatCount=$count;//global var
                                $active_cat_name=$c_name;
                                }
                        echo ' >'.$c_name.' 
                                <span class="count">'.$count;
                        echo '</span> </a> </li> ';
                    }
                        $c_num = $row['c_num'];
                        $c_name = $row['name'];

                        $sql1="select count(*) from bookcategories where c_num =$c_num";

                        $res1=mysqli_query($con,$sql1);
                        $countrow=mysqli_fetch_array($res1);
                        $count = $countrow['count(*)'];
                        
*/
                    }
                ?>
                
            </ul>
        </aside>