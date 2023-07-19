<?php
    require_once 'MySqlDataAccessLayer.php';
    try {
        $db = new MySqlDataAccessLayer('library');
        $db->connect();
    }catch (PDOException $ex)
    {
        echo $ex->getMessage();
    }

    $res = $db->selectData('select * from book where b_id = 111');
    echo $res[0]['add_date'];
    $dt = date_create_from_format('Y-m-d H:i:s',$res[0]['add_date']);
    var_dump($dt);




