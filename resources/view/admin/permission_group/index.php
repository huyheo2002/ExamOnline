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
                    <h2 class="content__title">Danh sách nhóm quyền</h2>
                    <table>
                        <tr>
                            <th style="width: 10%">Id</th>
                            <th style="width: 50%">Tên nhóm quyền</th>
                            <th style="width: 40%">Hoạt động</th>
                        </tr>
                        <?php
                        if (!empty($permissionGroups)) {
                            foreach ($permissionGroups as $permissionGroup) {
                        ?>
                                <tr>
                                    <td><?= $permissionGroup->id ?></td>
                                    <td><?= $permissionGroup->name ?></td>
                                    <td class="list__action">
                                        <?php
                                        if (Gate::can("view-permission-group")) {
                                        ?>
                                            <a href="<?= Route::path('permission-group.show', ['id' => $permissionGroup->id]) ?>">Hiển thị</a>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (Gate::can("update-permission-group")) {
                                        ?>
                                            <a href="<?= Route::path('permission-group.edit', ['id' => $permissionGroup->id]) ?>">Chỉnh sửa</a>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (Gate::can("delete-permission-group")) {
                                        ?>
                                            <a href="<?= Route::path('permission-group.delete', ['id' => $permissionGroup->id]) ?>">Xóa</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                    <div class="content__listBtn">
                        <?php
                        if (Gate::can("create-permission-group")) {
                        ?>
                            <a href="<?= Route::path('permission-group.create') ?>" class="content__btnAdd">Thêm mới</a>
                        <?php
                        }
                        ?>
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