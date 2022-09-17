<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "./resources/view/partitions/head.php";
    ?>
    <link rel="stylesheet" href="./resources/css/form.css">
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
                    <div class="content__wrap">
                        <h2 class="content__title">Hiển thị nhóm quyền</h2>                    
                        <?php
                            if(!empty($permissionGroup)) {                            
                                                        
                        ?>
                            <!-- form ảo :v -->
                            <div class="formClone">
                                <div class="item">
                                    <label for="">Id</label>
                                    <input type="text" placeholder="<?= $permissionGroup["id"] ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Tên :</label>
                                    <input type="text" placeholder="<?= $permissionGroup["name"] ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Tạo lúc :</label>
                                    <input type="text" placeholder="<?= $permissionGroup["created_at"] ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Cập nhật lúc :</label>
                                    <input type="text" placeholder="<?= $permissionGroup["updated_at"] ?>" disabled>
                                </div>
                                                        
                        <?php 
                            }
                        ?>
                                <div class="content__listBtn flex-start">
                                    <button class="content__btnExit btn-margin">Exit</button>                    
                                </div>
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
</body>
</html>