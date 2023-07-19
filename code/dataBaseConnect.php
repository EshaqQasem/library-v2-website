<?php
    
        $con = mysqli_connect('localhost','root','','library');
            if($error=mysqli_connect_error())
            {
            die('حدث خطا بلاتصال بقاعدة البيانات:الخطأ '.$error);   
            }
            $sql="select b_id from book order by b_id desc limit 10";
                        $reader= mysqli_query($con,$sql);
                        if($reader === false)//حدث خطا بتنفيذ الاستعلام
                        {
                            echo "حدث خطا بتنفيذ الاستعلام";
                        }
                        

?>