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
                            if(!empty($user)) {                            
                                                        
                        ?>
                            <!-- form ảo :v -->
                            <div class="formClone">
                                <div class="item">
                                    <label for="">Id</label>
                                    <input type="text" placeholder="<?= $user["id"] ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Tên :</label>
                                    <input type="text" placeholder="<?= $user["name"] ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="email">Email :</label>
                                    <input type="email" placeholder="<?= $user["email"] ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="username">Username :</label>
                                    <input type="text" placeholder="<?= $user["username"] ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="password">Password :</label>
                                    <input type="password" placeholder="<?= $user["password"] ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="phone">Phone :</label>
                                    <input type="text" placeholder="<?= $user["phone"] ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="role_id">Vai trò :</label>
                                    <input type="text" placeholder="<?= !empty($user['role']) ? $user['role']['name'] : '' ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="avatar">Ảnh đại diện :</label>
                                    <img src="<?= $user["avatar"] ?>" alt="" style="max-width: 150px;">
                                </div>
                                <div class="item">
                                    <label for="">Tạo lúc :</label>
                                    <input type="text" placeholder="<?= $user["created_at"] ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Cập nhật lúc :</label>
                                    <input type="text" placeholder="<?= $user["updated_at"] ?>" disabled>
                                </div>
                                                        
                        <?php 
                            }
                        ?>
                                <div class="content__listBtn flex-start">
                                    <button class="content__btnExit btn-margin">
                                        <a href="<?= Route::path('user.index') ?>">Trở về</a>
                                    </button>                    
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