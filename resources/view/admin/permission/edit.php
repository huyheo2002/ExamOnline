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
                        <h2 class="content__title">Chỉnh sửa quyền</h2>
                        <?php
                        if (!empty($permission)) {

                        ?>
                            <form action="<?= Route::path('permission.update', ['id' => $permission->id]) ?>" method="POST">
                                <div class="item">
                                    <label for="id">Id :</label>
                                    <input value="<?= $permission->id ?>" type="text" name="id" id="id" disabled>
                                </div>
                                <div class="item">
                                    <label for="name">Tên :</label>
                                    <input value="<?= $permission->name ?>" type="text" name="name" id="name">
                                </div>
                                <div class="item">
                                    <label for="key">Khóa :</label>
                                    <input value="<?= $permission->key ?>" type="text" name="key" id="key">
                                </div>
                                <div class="item">
                                    <label for="name">Nhóm</label>
                                    <select name="permission_group_id" id="permission_group_id">
                                        <?php
                                        if (!empty($permissionGroups)) {
                                            foreach ($permissionGroups as $permissionGroup) {
                                        ?>
                                                <option value="<?= $permissionGroup->id ?>" <?= ($permissionGroup->id === $permission->permission_group_id) ? 'selected' : '' ?>><?= $permissionGroup->name ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="item">
                                    <label for="created_at">Tạo lúc :</label>
                                    <input value="<?= $permission->created_at ?>" type="text" name="created_at" id="created_at" disabled>
                                </div>
                                <div class="item">
                                    <label for="updated_at">Cập nhật lúc :</label>
                                    <input value="<?= $permission->updated_at ?>" type="text" name="updated_at" id="updated_at" disabled>
                                </div>

                                <div class="content__listBtn">
                                    <input type="submit" value="Cập nhật" class="content__btnAdd">
                                    <a class="content__btnExit" href="<?= Route::path('permission.index') ?>">Trở về</a>
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