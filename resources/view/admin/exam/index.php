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
                    <h2 class="content__title">Danh sách đề thi</h2>
                    <table>
                        <tr>
                            <th style="width: 5%">Id</th>
                            <th style="width: 30%">Tên</th>
                            <th style="width: 20%">Danh mục</th>
                            <th style="width: 5%">Tạo bởi</th>
                            <th style="width: 40%">Hoạt động</th>
                        </tr>
                    <?php
                        if(!empty($exams)) {
                            foreach ($exams as $exam) {                   
                    ?>
                        <tr>
                            <td><?= $exam->id ?></td>
                            <td><?= $exam->name ?></td>
                            <td><?= $exam->category()->name ?? "Không có danh mục" ?></td>
                            <td><?= $exam->creator()->name ?? "Ẩn danh" ?></td>
                            
                            <td class="list__action">
                                <!-- test -->
                                <a href="<?= Route::path('exam.show', ['id' => $exam->id]) ?>">Hiển thị</a>
                                <a href="<?= Route::path('exam.edit', ['id' => $exam->id]) ?>">Chỉnh sửa</a>
                                <a href="<?= Route::path('exam.delete', ['id' => $exam->id]) ?>">Xóa</a>
                            </td>
                        </tr>                        
                    <?php
                            }
                        }
                    ?>
                    </table>
                    <div class="content__listBtn">
                        <a href="<?= Route::path('exam.create') ?>" class="content__btnAdd">Thêm mới</a>
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