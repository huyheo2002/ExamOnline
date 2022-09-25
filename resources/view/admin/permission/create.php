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
                        <h2 class="content__title">Thêm mới quyền</h2>
                        <form action="<?= Route::path('permission.store') ?>" method="POST">
                            <div class="item">
                                <label for="id">ID :</label>
                                <input type="text" name="id" id="id" disabled placeholder="Không cần nhập dữ liệu ở đây">
                            </div>
                            <div class="item">
                                <label for="name">Tên :</label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="item">
                                <label for="key">Khóa :</label>
                                <input type="text" name="key" id="key">
                            </div>
                            <div class="item">
                                <label for="permission_group_id">Nhóm quyền</label>
                                <select name="permission_group_id" id="permission_group_id">
                                    <?php
                                    if (!empty($permissionGroups)) {
                                        foreach ($permissionGroups as $permissionGroup) {
                                    ?>
                                            <option value="<?= $permissionGroup->id ?>"><?= $permissionGroup->name ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
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
                                <a class="content__btnExit" href="<?= Route::path('permission.index') ?>">Trở về</a>
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