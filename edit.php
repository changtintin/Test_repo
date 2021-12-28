<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <?php
        header("Content-Type:text/html; charset=utf-8");
        $connect = mysqli_connect('localhost', 'root', 'root','vocabulary_collection');
        if($connect){
            mysqli_query($connect, 'SET NAME UTF8');
        }
        else{
            die('無法連線，錯誤訊息為' . mysqli_connect_error());
        }

        if(isset($_POST["edit_serial_num"])){
            $serial_num = $_POST["edit_serial_num"] ;
            $select = "SELECT * FROM `vocabulary` WHERE  `serial_number` = {$serial_num}";
            $result = mysqli_query($connect, $select);
            

            if(!mysqli_num_rows($result)) { 
                echo "get null value fk";
            }
            else if(mysqli_num_rows($result) == 1){
                $info = mysqli_fetch_assoc($result);
                $serial_number = $info["serial_number"];
                $vocabulary = $info["vocabulary"];
                $join_date = $info["join_date"];
                $meaning = $info["meaning"];
                $part_of_speech = $info["part_of_speech"];
                $note = $info["note"];

                echo "<form action='bridge.php' method='post'>";
                    echo "不要動它的值";
                    echo "<input type='text' name='se' value='{$serial_number}'>"."<br>";
                    echo "<input type='text' name='ve' placeholder='{$vocabulary}'>" ."<br>";
                    echo "<input type='text' name='je' placeholder='{$join_date}'>" . "<br>";
                    echo "<input type='text' name='me' placeholder='{$meaning}'>" . "<br>";
                    echo "<input type='text' name='pe' placeholder='{$part_of_speech}'>" . "<br>";
                    echo "<input type='text' name='ne' placeholder='{$note}'>" . "<br>";
                    echo "<input type='submit' name='edit_submit'>";
                echo "</form>";
            }
            else{
                echo "get too much value!!!! serial number:" . $serial_num;
            }    
            
        
        }

    ?>
</body>
</html>