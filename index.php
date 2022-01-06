<?php
    header("Content-Type:text/html; charset=utf-8");
    $connect = mysqli_connect('localhost', 'root','root','vocabulary_collection');
    if($connect) {
        mysqli_query($connect, "SET NAMES UTF8");
    }
    else {
        die('連線失敗，輸出錯誤訊息'.mysqli_error());
    }
?>

<!DOCTYPE html>
<html>
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- bootstrap 4.2.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- bootstrap above -->
    
    <title>Vocanote</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="style.css"> 
    
</head>
<body class="body">
   
    <div class="outline">
        <div>
            <div style="background-color: rgb(246, 240, 228); outline:solid; border-radius: 2px; box-shadow: 0 0 0 10px rgb(128, 128, 128); " class="jumbotron bg-cover header p-3">
                <div class="container py-5 text-center" style="padding: 10px">
                    <h1 class="font-weight-bold" href="index.php">This is Vocanote.</h1>
                    <p class="font-italic">Your first free vocabulary notebook.</p>
                    <p class="font-italic">Developed by
                        <a href="#" style="color:rgb(128, 128, 128);">
                            <u>WEN-TING CHANG</u>
                        </a>
                    </p>
                    <a href="#" role="submit" class="btn  button_style" >More about Vocanote</a>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg" style="background-color: rgb(204, 152, 118); ">
                <div class="container-fluid">
                <button class="navbar-toggler" type="submit" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" >
                        <a class="navbar-brand" href="index.php">
                            <img src="greyhome_icon.png" width="50" height="50" alt="back to main page" ;>
                        </a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" href="insert.php">Add a new voca!</a>
                    </li>
                    <li class="nav-item" style="padding-right: 800px;">
                        <a class="nav-link" href="#">External link</a>
                    </li>
                    </ul>
                    <form class="d-flex" action="search_result.php" method="post" >
                        <input class="form-control me-2" type="text" placeholder="Voca or Meaning" aria-label="Search" style="border: none ;" name="voca_input" >
                            <input type="submit" class="btn btn-secondary button_style"  role="button" aria-disabled="true" name="voca_search">                 
                    </form>
                </div>
                </div>
            </nav>
        </div>

        <?php
            $select = "SELECT * FROM `vocabulary` WHERE 1"; //拿到所有資料
            $result = mysqli_query($connect, $select); //針對某個資料庫（參數一）做SQL語法指令（參數二）

            if(mysqli_num_rows($result) > 0) { //回傳的列數
                include("table_fixed.php");
                            $count = 1;
                            while($row = mysqli_fetch_assoc($result)) { //抓下來資料表是一個array 以json存取 e.g. meaning（key) \冷的(value)
                                $v = $row["vocabulary"]; // vocabulary = array的index
                                $j = $row["join_date"];
                                $m = $row["meaning"];
                                $p = $row["part_of_speech"];
                                $n = $row["note"];
                                $serial_number = $row["serial_number"];
                                echo 
                                    '<tr>
                                        <th scope="row" style="color:rgb(128, 128, 128);">'.$count.'</th>
                                        <td>'.$v.'</td>
                                        <td>'.$j.'</td>
                                        <td>'.$m.'</td>
                                        <td>'.$p.'</td>
                                        <td>'.$n.'</td>
                                        <td>
                                            <form action="edit.php" method="post">
                                                <button type="submit" class="btn btn-secondary button_style3"  name="edit_serial_num" value="'.$serial_number.'">update</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action = "bridge.php" method="post">
                                                <button type="submit" class="btn btn-secondary button_style2" name="delete_btn" value="'.$serial_number.'">Delete</button>
                                            </form>
                                        </td>
                                    </tr>';
                                
                                $count ++;
                            }
                echo       '</tbody>
                        </table>
                    </div>';
            }
        ?>
    </div>
        
   
</body>
</html>

