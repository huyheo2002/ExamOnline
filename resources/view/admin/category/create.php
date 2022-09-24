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
                        <h2 class="content__title">Thêm mới danh mục</h2>
                        <form action="<?= Route::path('category.store') ?>" method="POST">
                            <div class="item">
                                <label for="id">ID :</label>
                                <input type="text" name="id" id="id" disabled placeholder="Không cần nhập dữ liệu ở đây">
                            </div>
                            <div class="item">
                                <label for="name">Tên :</label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="item">
                                <label for="permission">Giáo viên :</label>
                                <div class="">
                                    <?php
                                    if (!empty($teachers)) {
                                        foreach ($teachers as $teacher) {
                                    ?>
                                            <div class="check__wrap">
                                                <input class="check_cb" type="checkbox" name="teacher_ids[]" id="chk_teacher_<?= $teacher['id'] ?>" value="<?= $teacher["id"] ?>">
                                                <label for="chk_teacher_<?= $teacher['id'] ?>" class="check__name"><?= $teacher["name"] ?></label>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
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
                                <a class="content__btnExit" href="<?= Route::path('category.index') ?>">Trở về</a>
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