<?php 
header("Content-Type:text/html; charset=utf-8");

$connect = mysqli_connect('localhost','root','root','vocabulary_collection');
if(!$connect){
    die('連線失敗，輸出錯誤訊息_'.mysql_error());
}

if(isset($_POST['index_submit'])) {
    $vocabulary = $_POST['vocabulary'];
    $join_date = $_POST['join_date'];
    $meaning = $_POST['meaning'];
    $part_of_speech = $_POST['part_of_speech'];
    $note = $_POST['note'];

    $insert = "insert into vocabulary(vocabulary, join_date, meaning, part_of_speech, note) VALUES ('$vocabulary','$join_date','$meaning','$part_of_speech','$note')";

    if (mysqli_query($connect, $insert))
        header("Location: list.php");
    else
        echo "插入資料失敗".mysql_error();
}

if(isset($_POST['edit_submit'])) { //'edit_submit'=>表單的名字
    if($_POST['v'] != "") {
        $update = "UPDATE `vocabulary` SET `vocabulary`='{$_POST['v']}' WHERE `serial_number`='{$_POST['s']}'";
        mysqli_query($connect, $update);
    }

    if($_POST['j'] != "") {
        $update = "UPDATE `vocabulary` SET `join_date`='{$_POST['j']}' WHERE `serial_number`='{$_POST['s']}'"; //where成立的時候 set才會執行
        mysqli_query($connect, $update);
    }

    if($_POST['m'] != "") {
        $update = "UPDATE `vocabulary` SET `meaning`='{$_POST['m']}' WHERE `serial_number`='{$_POST['s']}'";
        mysqli_query($connect, $update);
    }

    if($_POST['p'] != "") {
        $update = "UPDATE `vocabulary` SET `part_of_speech`='{$_POST['p']}' WHERE `serial_number`='{$_POST['s']}'";
        mysqli_query($connect, $update);
    }

    if($_POST['n'] != "") {
        $update = "UPDATE `vocabulary` SET `note`='{$_POST['n']}' WHERE `serial_number`='{$_POST['s']}'";
        mysqli_query($connect, $update);
    }

    header("Location: list.php");//要回到interface
    
    // echo "插入資料失敗".mysql_error();
}

if(isset($_POST['delete_serial_number'])) {
    $delete = "DELETE FROM `vocabulary` WHERE `serial_number`='{$_POST['delete_serial_number']}'";
    mysqli_query($connect, $delete);

    header("Location: list.php"); 
}