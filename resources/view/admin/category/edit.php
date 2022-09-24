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
                        <h2 class="content__title">Chỉnh sửa danh mục</h2>
                        <?php
                        if (!empty($category)) {

                        ?>                        
                            <form action="<?= Route::path('category.update', ['id' => $category['id']]) ?>" method="POST">
                                <div class="item">
                                    <label for="id">Id :</label>
                                    <input value="<?= $category['id'] ?>" type="text" name="id" id="id" disabled>
                                </div>
                                <div class="item">
                                    <label for="name">Tên :</label>
                                    <input value="<?= $category['name'] ?>" type="text" name="name" id="name">
                                </div>
                                <?php 
                                    $selectedTeachers = [];
                                    if(!empty($category["users"])) {
                                        $selectedTeachers = array_map(fn($user) => $user["id"] ?? 0, $category["users"]);
                                    }                                    
                                ?>
                                <div class="item">
                                    <label for="permission">Giáo viên :</label>
                                    <div class="">
                                        <?php
                                        if (!empty($teachers)) {
                                            foreach ($teachers as $teacher) {
                                        ?>
                                                <div class="check__wrap">
                                                    <input class="check_cb" type="checkbox" name="teacher_ids[]" id="chk_teacher_<?= $teacher['id'] ?>" value="<?= $teacher["id"] ?>" <?= in_array($teacher["id"], $selectedTeachers) ? "checked" : "" ?>>
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
                                    <input value="<?= $category['created_at'] ?>" type="text" name="created_at" id="created_at" disabled>
                                </div>
                                <div class="item">
                                    <label for="updated_at">Cập nhật lúc :</label>
                                    <input value="<?= $category['updated_at'] ?>" type="text" name="updated_at" id="updated_at" disabled>
                                </div>

                                <div class="content__listBtn">
                                    <input type="submit" value="Cập nhật" class="content__btnAdd">
                                    <a class="content__btnExit" href="<?= Route::path('category.index') ?>">Trở về</a>
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