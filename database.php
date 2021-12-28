<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practice</title>
</head>
<style>
    table, th, td{
        border:2px solid black;
    }
</style>
<body>
    <?php
    header("Content-type:text/html; charset=utf-8");
    $connect = mysqli_connect('localhost', 'root','root','vocabulary_collection');
    if($connect){
        mysqli_query($connect,"SET NAMES UTF-8");
        echo "hahaha";
    }
    else{
        die('連線失敗，輸出錯誤訊息_'.mysqli_error());
    }
    $select = "SELECT * FROM `vocabulary` WHERE 1";
    $result = mysqli_query($connect, $select);
    if(mysqli_num_rows($result)>0){
        echo '<table>
                <tr>
                    <td>index</td>
                    <td>vocabulary</td>
                    <td>join_date</td>
                    <td>meaning</td>
                    <td>part_of_speech</td>
                    <td>part_of_speech</td>
                    <td>update</td>
                    <td>delete</td>
                </tr>';
        $count = 0;
        while($row= mysqli_fetch_assoc($result)){
            $v = $row["vocabulary"];
            $j = $row["join_date"];
            $m = $row["meaning"];
            $p = $row["part_of_speech"];
            $n = $row["note"];
            echo '<tr>
                    <th>'.$count.'</th> 
                    <td>'.$v.'</td> 
                    <td>'.$j.'</td>
                    <td>'.$m.'</td>
                    <td>'.$p.'</td>
                    <td>'.$n.'</td>
                 </tr>';
            $count++ ;
        }
        echo '</table>';
             

    }
    ?>
</body>
</html>


    


