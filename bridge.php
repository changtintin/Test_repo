<?php

    header("Content-Type:text/html; charset=utf-8");

    $connect = mysqli_connect('localhost','root','root','vocabulary_collection');
    if(!$connect){
        die('連線失敗，輸出錯誤訊息_'.mysql_error());
    }
    mysqli_query($connect,"SET NAMES UTF8"); //將資料庫設定為utf8編碼，防止中文亂碼

    $vocabulary = $_POST['vocabulary']; //php接收表單
    $join_date = $_POST['join_date'];
    $meaning = $_POST['meaning'];
    $part_of_speech = $_POST['part_of_speech'];
    $note = $_POST['note'];
    // echo $vocabulary; 成功接收之後會印出來
    $sqlStr = "insert into vocabulary(vocabulary,join_date,meaning,part_of_speech,note)
    VALUES ('$vocabulary','$join_date','$meaning','$part_of_speech','$note')";
        if($meaning!=""){
            if (mysqli_query($connect, $sqlStr)) {
                echo "插入資料成功";
                header("Location: interface.php");
                
            } 
            else {
                echo "插入資料失敗".mysql_error();
            }
        }
        else{
            header("Location:interface.php");
        }
    
    if(isset($_POST['edit_submit'])){
        if($_POST['ve']!=" "){
            
        }
    }


?>