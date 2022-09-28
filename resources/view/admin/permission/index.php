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
                    <h2 class="content__title">Danh sách quyền</h2>
                    <table>
                        <tr>
                            <th style="width: 5%">Id</th>
                            <th style="width: 20%">Tên quyền</th>
                            <th style="width: 25%">Key</th>
                            <th style="width: 20%">Nhóm quyền</th>
                            <th style="width: 30%">Hoạt động</th>
                        </tr>
                        <?php
                        if (!empty($permissions)) {
                            foreach ($permissions as $permission) {
                        ?>
                                <tr>
                                    <td><?= $permission->id ?></td>
                                    <td><?= $permission->name ?></td>
                                    <td><?= $permission->key ?></td>
                                    <td><?= $permission->permissionGroup()->name ?></td>

                                    <td class="list__action">
                                        <?php
                                        if (Gate::can("view-permission")) {
                                        ?>
                                            <a href="<?= Route::path('permission.show', ['id' => $permission->id]) ?>">Hiển thị</a>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (Gate::can("update-permission")) {
                                        ?>
                                            <a href="<?= Route::path('permission.edit', ['id' => $permission->id]) ?>">Chỉnh sửa</a>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (Gate::can("delete-permission")) {
                                        ?>
                                            <a href="<?= Route::path('permission.delete', ['id' => $permission->id]) ?>">Xóa</a>
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
                        if (Gate::can("create-permission")) {
                        ?>
                            <a href="<?= Route::path('permission.create') ?>" class="content__btnAdd">Thêm mới</a>
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