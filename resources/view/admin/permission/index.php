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
                    <h2 class="content__title">Danh sách quyền</h2>
                    <table>
                        <tr>
                            <th style="width: 5%">Id</th>
                            <th style="width: 30%">Tên quyền</th>
                            <th style="width: 20%">Key</th>
                            <th style="width: 5%">Nhóm quyền</th>
                            <th style="width: 40%">Hoạt động</th>
                        </tr>
                    <?php
                        if(!empty($permissions)) {
                            foreach ($permissions as $permission) {
                                                            
                    ?>
                        <tr>
                            <td><?= $permission["id"] ?></td>
                            <td><?= $permission["name"] ?></td>
                            <td><?= $permission["key"] ?></td>
                            <td><?= $permission["permission_group_id"] ?></td>
                            
                            <td class="list__action">
                                <!-- test -->
                                <a href="<?= Route::path('permission.show', ['id' => $permission['id']]) ?>">Hiển thị</a>
                                <a href="<?= Route::path('permission.edit', ['id' => $permission['id']]) ?>">Chỉnh sửa</a>
                                <a href="<?= Route::path('permission.delete', ['id' => $permission['id']]) ?>">Xóa</a>
                            </td>
                        </tr>                        
                    <?php
                            }
                        }
                    ?>
                    </table>
                    <div class="content__listBtn">
                        <a href="<?= Route::path('permission.create') ?>" class="content__btnAdd">Thêm mới</a>
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