<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap 4.2.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- bootstrap above -->

    <style>
        .title_font{
            color: rgb(128, 128, 128);
            font-size: 20px;
            padding: 3px;
        }
        .bg-cover {
            background-size: cover !important;
        }
        .header{
            border-style: solid;
            border-width: 7px;
            border-color: rgb(128, 128, 128);
            color:rgb(128, 128, 128);
        }
        .h1{
            padding-bottom: 25px;
        }
        .outline{
            background-color: rgb(246, 240, 228);
            border-style: solid;
            border-color: rgb(246, 240, 228);
            padding: 25px;
        }
        .body{
            background-color: rgb(246, 240, 228);;
        }
        .button_style{
            background-color: rgb(128, 128, 128); 
            border: none;
            color: white;
        }
        .button_style2{
            background-color: rgb(146, 86, 86); <!--red-->
            border: none;
            color: white;
        }
        .button_style3{
            background-color: rgb(204, 152, 118); 
            border: none;
            color: white;
        }
        .navbar{
            margin: 20px;
            border-radius: 10px;
        }
        .nav-link{
            color:white;
            font-weight: 500;
        }

        a:hover {
            color: rgb(146, 86, 86);
        }
        .icon_button{
            display: flex;
            height: 50px;
            padding: 0;
            background: #009578;
            border: none;
            outline: none;
            border-radius: 5px;
            overflow: hidden;
            font-family: "Quicksand", sans-serif;
        }
        .btn_text{
            color:white;
            font-weight: 500;
        }
        
    </style>
</head>
<body>
    <div class="outline">

        <div>
            <div style="background-color: rgb(246, 240, 228); outline:solid; border-radius: 2px; box-shadow: 0 0 0 10px rgb(128, 128, 128); " class="jumbotron bg-cover header p-3">
                <div class="container py-5 text-center" style="padding: 10px">
                    <h1 class="font-weight-bold" href="index.php">Search result</h1>
                    <p class="font-italic">This is Vocanote. Your first free vocabulary notebook.</p>
                    <p class="font-italic">Developed by
                        <a href="https://bootstrapious.com" style="color:rgb(128, 128, 128);">
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
                        <li class="nav-item">
                            <a class="navbar-brand" href="index.php">
                                <img src="greyhome_icon.png" width="50" height="50" alt="back to main page" background-color="rgb(146, 86, 86)";>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Add a new voca!</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="padding-right: 800px;">External link</a>
                        </li>
                        </ul>
                        <form class="d-flex" action="search_result.php" method="post" >
                            <input class="form-control me-2" type="text" placeholder="Voca or Meaning" aria-label="Search" style="border: none ;" name="voca_input" >
                            <input type="submit" class="btn btn-secondary button_style" role="button" aria-disabled="true" name="voca_search">
                        </form>
                    </div>
                </div>
            </nav>
        </div>

        
        <?php
            $connect = mysqli_connect('localhost', 'root', 'root', 'vocabulary_collection');
            if(!$connect){
                die('連線失敗，輸出錯誤訊息_'.mysql_error());
            }
            
            mysqli_query($connect,"SET NAMES UTF8"); 

            if(isset($_POST['voca_search'])){
                $select_search = "SELECT * FROM `vocabulary` WHERE `vocabulary` = '{$_POST['voca_input']}' or `meaning` = '{$_POST['voca_input']}'";                
                $search_result = mysqli_query($connect,$select_search); 

                echo '<div class="container" style="padding-top: 50px;">
                            <table class="table table-striped table-hover" >
                                <thead class="title_font">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Vocabulary</th>
                                        <th scope="col">Join Date</th>
                                        <th scope="col">Meaning</th>
                                        <th scope="col">Part of Speech</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>';

                                $count = 1;
                    while($data = mysqli_fetch_assoc($search_result)) { //抓下來資料表是一個array 以json存取 e.g. meaning（key) \冷的(value)
                                $serial_number = $data["serial_number"];
                                echo 
                                    '<tr>
                                        <th scope="row" style="color:rgb(128, 128, 128);">'.$count.'</th>
                                        <td>'.$data['vocabulary'].'</td>
                                        <td>'.$data['join_date'].'</td>
                                        <td>'.$data['meaning'].'</td>
                                        <td>'.$data['part_of_speech'].'</td>
                                        <td>'.$data['note'].'</td>
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