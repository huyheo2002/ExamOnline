<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <div id="main">
        <!-- <div class="header">This is Header :v</div> -->
        <div class="body">
            <?php
                include "./resources/view/partitions/sidebar.php";
            ?>
            <div class="body__content">
                <?php
                    include "./resources/view/partitions/header.php";
                ?>
                <div class="content__main show">
                    <?php
                        if(isset($_GET["control"])){
                            $className = $_GET["control"];
                            require_once "./app/controllers/admin/".$className.".php";
                            $obj = new $className();
                            $obj->handle($_GET["action"] ?? "");
                        }
                    ?>
                    <!-- <h2 class="content__title">this is title1</h2>
                    <table>
                        <tr>
                            <th style="width: 10%" title="hello">table head</th>
                            <th style="width: 20%">table head</th>
                            <th style="width: 50%">table head</th>
                            <th style="width: 20%">table head</th>
                        </tr>
                        <tr>
                            <td>table data1</td>
                            <td>table data2</td>
                            <td>table data3</td>
                            <td>table data4</td>
                        </tr>
                        <tr>
                            <td>table data</td>
                            <td>table data</td>
                            <td>table data</td>
                            <td>table data</td>
                        </tr>
                        <tr>
                            <td>table data</td>
                            <td>table data</td>
                            <td>table data</td>
                            <td>table data</td>
                        </tr>
                    </table>
                    <div class="content__listBtn">
                        <button class="content__btnAdd">Insert</button>
                        <button class="content__btnExit">Exit</button>                    
                    </div> -->
                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
</body>
</html>