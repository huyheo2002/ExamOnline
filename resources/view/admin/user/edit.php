<?php
require_once "./app/Route.php";

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
                        <h2 class="content__title">Chỉnh sửa nhóm quyền</h2>
                        <?php
                        if (!empty($user)) {

                        ?>                        
                            <form action="<?= Route::path('permission-group.update', ['id' => $user['id']]) ?>" method="POST">
                                <div class="item">
                                    <label for="id">Id :</label>
                                    <input value="<?= $user['id'] ?>" type="text" name="id" id="id" disabled>
                                </div>
                                <div class="item">
                                    <label for="name">Tên :</label>
                                    <input value="<?= $user['name'] ?>" type="text" name="name" id="name">
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
                                <?php
                                    $selectedRole = $user["role_id"] ?? 0;
                                ?>
                                <div class="item">
                                    <label for="role_id">Vai trò :</label>
                                    <select name="role_id" id="role_id">
                                        <?php 
                                            if(!empty($roles)) {
                                                foreach($roles as $role) {                                                                                   
                                        ?>
                                                <option value="<?= $role["id"] ?>" <?= ($role["id"] == $selectedRole) ? "selected" : "" ?> ><?= $role["name"] ?></option>                                    
                                        <?php 
                                                }
                                            } 
                                        ?>
                                    </select>
                                </div>
                                <div class="item">
                                    <label for="avatar">Ảnh đại diện :</label>
                                    <input type="file" name="avatar" id="avatar">
                                    <img src="<?= $user["avatar"] ?>" alt="" style="max-width: 150px;">
                                </div>
                                <div class="item">
                                    <label for="created_at">Tạo lúc :</label>
                                    <input value="<?= $user['created_at'] ?>" type="text" name="created_at" id="created_at" disabled>
                                </div>
                                <div class="item">
                                    <label for="updated_at">Cập nhật lúc :</label>
                                    <input value="<?= $user['updated_at'] ?>" type="text" name="updated_at" id="updated_at" disabled>
                                </div>

                                <div class="content__listBtn">
                                    <input type="submit" value="Cập nhật" class="content__btnAdd">
                                    <a class="content__btnExit" href="#">Trở về</a>
                                </div>
                            </form>

                        <?php
                        }

                        ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
</body>

</html>