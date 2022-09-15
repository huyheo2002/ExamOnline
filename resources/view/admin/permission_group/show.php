<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "./resources/view/partitions/head.php";
    ?>
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
                    <h2 class="content__title">Hiển thị nhóm quyền</h2>
                    <?php
                        if(!empty($permissionGroup)) {                            
                                                    
                    ?>
                        <div class="">
                            <label for="">Id</label>
                            <p><?= $permissionGroup["id"] ?></p>
                        </div>
                        <div class="">
                            <label for="">name</label>
                            <p><?= $permissionGroup["name"] ?></p>
                        </div>
                        <div class="">
                            <label for="">created_at</label>
                            <p><?= $permissionGroup["created_at"] ?></p>
                        </div>
                        <div class="">
                            <label for="">updated_at</label>
                            <p><?= $permissionGroup["updated_at"] ?></p>
                        </div>
                    <?php 
                        }
                    ?>
                    <div class="content__listBtn">
                        <button class="content__btnExit">Exit</button>                    
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
</body>
</html>