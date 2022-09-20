<?php
require_once "./app/Route.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "./resources/view/partitions/head.php";
    ?>
    <link rel="stylesheet" href="./resources/css/index.css">
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
                    <h2 class="content__title">Danh sách người dùng</h2>
                    <table>
                        <tr>
                            <th style="width: 10%">Ảnh đại diện</th>
                            <th style="width: 30%">Tên người dùng</th>
                            <th style="width: 30%">Vai trò</th>
                            <th style="width: 30%">Hoạt động</th>
                        </tr>
                    <?php
                        if(!empty($users)) {
                            foreach ($users as $user) {
                                                            
                    ?>
                        <tr>
                            <td> 
                                <div class="user-avatar" style="width: 150px; height: 150px; display: flex; justify-content: center; align-items: center;">
                                    <img src="<?= $user["avatar"] ?>" alt="Avatar" style="max-width: 100%; max-height: 100%;"> 
                                </div>
                            </td>
                            <td><?= $user["name"] ?></td>
                            <td><?= $user["role"]["name"] ?></td>
                            <td class="list__action" style="height: 158px; padding: 63px 8px;">
                                <!-- test -->
                                <a href="<?= Route::path('user.show', ['id' => $user['id']]) ?>">Hiển thị</a>
                                <a href="<?= Route::path('user.edit', ['id' => $user['id']]) ?>">Chỉnh sửa</a>
                                <a href="<?= Route::path('user.delete', ['id' => $user['id']]) ?>">Xóa</a>
                            </td>
                        </tr>                        
                    <?php
                            }
                        }
                    ?>
                    </table>
                    <div class="content__listBtn">
                        <a href="<?= Route::path('user.create') ?>" class="content__btnAdd">Thêm mới</a>
                        <button class="content__btnExit">
                            <a href="<?= Route::path('login') ?>">Thoát</a> 
                        </button>                    
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
</body>
</html>