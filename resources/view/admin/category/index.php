<?php
require_once "./app/Route.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "./resources/view/admin/partitions/head.php";
    ?>
    <link rel="stylesheet" href="./resources/css/index.css">
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
                    <h2 class="content__title">Danh sách danh mục</h2>
                    <table>
                        <tr>
                            <th style="width: 10%">Id</th>
                            <th style="width: 50%">Tên danh mục</th>
                            <th style="width: 40%">Hoạt động</th>
                        </tr>
                    <?php
                        if(!empty($categories)) {
                            foreach ($categories as $category) {
                                
                            
                    ?>
                        <tr>
                            <td><?= $category["id"] ?></td>
                            <td><?= $category["name"] ?></td>
                            <td class="list__action">
                                <!-- test -->
                                <a href="<?= Route::path('category.show', ['id' => $category['id']]) ?>">Hiển thị</a>
                                <a href="<?= Route::path('category.edit', ['id' => $category['id']]) ?>">Chỉnh sửa</a>
                                <a href="<?= Route::path('category.delete', ['id' => $category['id']]) ?>">Xóa</a>
                            </td>
                        </tr>                        
                    <?php
                            }
                        }
                    ?>
                    </table>
                    <div class="content__listBtn">
                        <a href="<?= Route::path('category.create') ?>" class="content__btnAdd">Thêm mới</a>
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