<?php
header("Content-Type:text/html; charset=utf-8");

$connect = mysqli_connect("localhost", "root", "root", "vocabulary_collection");
if(!$connect) {
    die('連線失敗，輸出錯誤訊息'.mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table, th, tr, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        $select = "SELECT * FROM `vocabulary` WHERE 1"; //只是一個字串
        $result = mysqli_query($connect, $select); //放進函數才會有作用
        
        if(mysqli_num_rows($result) > 0) {
            echo "<table>";
                echo "<tr style='text-align:center;'>";
                    echo "<th>vocabulary</th>";
                    echo "<th>join_date</th>";
                    echo "<th>meaning</th>";
                    echo "<th>part_of_speech</th>";
                    echo "<th>note</th>";
                    echo "<th>edit</th>";
                    echo "<th>delete</th>";
                echo "</tr>";

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                    echo "<td>{$row['vocabulary']}     </td>"; //['vocabulary'] 中間是索引值，像[2]
                    echo "<td>{$row['join_date']}      </td>";
                    echo "<td>{$row['meaning']}        </td>";
                    echo "<td>{$row['part_of_speech']} </td>";
                    echo "<td>{$row['note']}           </td>";
                    echo "<td>";
                        echo "<form action='edit.php' method='post'>";
                            echo "<button type='submit' name='edit_serial_number' value='{$row['serial_number']}'>update</button>";//a_i (auto increase)流水號會增加，在這裡抓出來
                        echo "</form>";
                    echo "</td>";
                    echo "<td>";
                        echo "<form action='bridge.php' method='post'>";
                            echo "<button type='submit' name='delete_serial_number' value='{$row['serial_number']}'>delete</button>";
                        echo "</form>";
                    echo "</td>";
                echo "</tr>";
            }
        
            echo "</table>";
        }
    ?>
</body>
</html>