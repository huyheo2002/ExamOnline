<?php


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
                        <h2 class="content__title">Hiển thị danh mục</h2>
                        <?php
                        if (!empty($category)) {

                        ?>
                            <!-- form ảo :v -->
                            <div class="formClone">
                                <div class="item">
                                    <label for="">Id</label>
                                    <input type="text" placeholder="<?= $category->id ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Tên :</label>
                                    <input type="text" placeholder="<?= $category->name ?>" disabled>
                                </div>
                                <?php 
                                    $selectedTeachers = [];
                                    $currentTeachers = $category->users();
                                    if(!empty($currentTeachers)) {
                                        $selectedTeachers = array_map(fn($user) => $user->id ?? 0, $currentTeachers);
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
                                                    <input class="check_cb" type="checkbox" name="teacher_ids[]" id="chk_teacher_<?= $teacher->id ?>" value="<?= $teacher->id ?>" <?= in_array($teacher->id, $selectedTeachers) ? "checked" : "" ?> disabled>
                                                    <label for="chk_teacher_<?= $teacher->id ?>" class="check__name"><?= $teacher->name ?></label>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="item">
                                    <label for="">Tạo lúc :</label>
                                    <input type="text" placeholder="<?= $category->created_at ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Cập nhật lúc :</label>
                                    <input type="text" placeholder="<?= $category->updated_at ?>" disabled>
                                </div>

                            <?php
                        }
                            ?>
                            <div class="content__listBtn flex-start">
                                <button class="content__btnExit btn-margin">
                                    <a href="<?= Route::path('category.index') ?>">Trở về</a>
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