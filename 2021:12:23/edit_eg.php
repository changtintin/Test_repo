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
</head>
<body>
    <?php
        /* 預定義的 $_POST 變數用於收集來自 method="post" 的表單中的值。
        從帶有 POST 方法的表單發送的訊息，對任何人都是不可見的（不會顯示在瀏覽器的地址欄），並且對發送訊息的量也沒有限制。 */
        if(isset($_POST["edit_serial_number"])) {   //isset（）：確認變數是否存在
            $serial_number = $_POST["edit_serial_number"]; //從update button傳來的
            $select = "SELECT * FROM `vocabulary` WHERE serial_number = {$serial_number}"; //欄位＝數值，where是限制條件，當流水號＝x，會回傳資料表那一列的值。

            $result = mysqli_query($connect, $select);

            if(mysqli_num_rows($result) == 1) { //只能拿一列
                $data = mysqli_fetch_assoc($result);

                echo "<form action='bridge.php' method='post'>"; //form裡所有資料都會傳
                    echo "不要動它的值";
                    echo "<input type='text' name='s' value='{$data['serial_number']}'>"; //input:可以輸入的欄位
                    echo "<br><br><br><br>";
                    echo "<input type='text' name='v' placeholder='{$data['vocabulary']}'>"    ."<br>";
                    echo "<input type='text' name='j' placeholder='{$data['join_date']}'>"     ."<br>";
                    echo "<input type='text' name='m' placeholder='{$data['meaning']}'>"       ."<br>";
                    echo "<input type='text' name='p' placeholder='{$data['part_of_speech']}'>"."<br>";
                    echo "<input type='text' name='n' placeholder='{$data['note']}'>"          ."<br>";
                    echo "<input type='submit' name='edit_submit'>"; //input的submit按鈕
                echo "</form>";
            }
        }
    ?>
</body>
</html>