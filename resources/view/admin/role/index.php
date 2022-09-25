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
                    <h2 class="content__title">Danh sách vai trò</h2>
                    <table>
                        <tr>
                            <th style="width: 10%">Id</th>
                            <th style="width: 30%">Tên vai trò</th>
                            <th style="width: 30%">Các quyền</th>
                            <th style="width: 30%">Hoạt động</th>
                        </tr>
                        <?php
                        if (!empty($roles)) {
                            foreach ($roles as $role) {

                        ?>
                                <tr>
                                    <td><?= $role->id ?></td>
                                    <td><?= $role->name ?></td>
                                    <td>
                                        <select class="list__multiple" multiple>
                                            <?php
                                            if (!empty($role->permissions())) {
                                                foreach ($role->permissions() as $permission) {
                                            ?>
                                                    <option value="<?= $permission->id ?>"><?= $permission->name ?></option>
                                            <?php
                                                }
                                            }

                                            ?>
                                        </select>
                                    </td>
                                    <td class="list__action">
                                        <!-- test -->
                                        <a href="<?= Route::path('role.show', ['id' => $role->id]) ?>">Hiển thị</a>
                                        <a href="<?= Route::path('role.edit', ['id' => $role->id]) ?>">Chỉnh sửa</a>
                                        <a href="<?= Route::path('role.delete', ['id' => $role->id]) ?>">Xóa</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                    <div class="content__listBtn">
                        <a href="<?= Route::path('role.create') ?>" class="content__btnAdd">Thêm mới</a>
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