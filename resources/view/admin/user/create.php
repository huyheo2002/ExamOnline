<?php
    require_once "./app/Route.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "./resources/view/admin/partitions/head.php";
    ?>
    <link rel="stylesheet" href="./resources/css/form.css">
</head>
<body>
    <div id="main">
        <!-- <div class="header">This is Header :v</div> -->
        <div class="body">
            <?php
                include "./resources/view/admin/partitions/sidebar.php";
            ?>
            <div class="body__content">
                <?php
                    include "./resources/view/admin/partitions/header.php";
                    ?>
                <div class="content__main show">
                    <div class="content__wrap">
                        <h2 class="content__title">Thêm mới người dùng</h2>
                        <form action="<?= Route::path('user.store') ?>" method="POST" enctype="multipart/form-data">                    
                            <div class="item">
                                <label for="id">ID :</label>
                                <input type="text" name="id" id="id" disabled placeholder="Không cần nhập dữ liệu ở đây">
                            </div>
                            <div class="item">
                                <label for="name">Tên :</label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="item">
                                <label for="email">Email :</label>
                                <input type="email" name="email" id="email">
                            </div>
                            <div class="item">
                                <label for="username">Username :</label>
                                <input type="text" name="username" id="username">
                            </div>
                            <div class="item">
                                <label for="password">Password :</label>
                                <input type="password" name="password" id="password">
                            </div>
                            <div class="item">
                                <label for="phone">Phone :</label>
                                <input type="text" name="phone" id="phone">
                            </div>
                            <div class="item">
                                <label for="role_id">Vai trò :</label>
                                <select name="role_id" id="role_id">
                                    <?php 
                                        if(!empty($roles)) {
                                            foreach($roles as $role) {                                                                                   
                                    ?>
                                            <option value="<?= $role["id"] ?>"><?= $role["name"] ?></option>                                    
                                    <?php 
                                            }
                                        } 
                                    ?>
                                </select>
                            </div>
                            <div class="item">
                                <label for="avatar">Ảnh đại diện :</label>
                                <input type="file" name="avatar" id="avatar">
                            </div>
                            <div class="item">
                                <label for="created_at">Tạo lúc :</label>
                                <input type="text" name="created_at" id="created_at" disabled placeholder="Không cần nhập dữ liệu ở đây">
                            </div>
                            <div class="item">
                                <label for="updated_at">Cập nhật lúc :</label>
                                <input type="text" name="updated_at" id="updated_at" disabled placeholder="Không cần nhập dữ liệu ở đây">
                            </div>
                        
                    
                            <div class="content__listBtn">
                                <input type="submit" value="Tạo mới" class="content__btnAdd">
                                <a class="content__btnExit" href="<?= Route::path('user.index') ?>">Trở về</a>                    
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
</body>
</html>