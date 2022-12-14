<?php
require_once "./app/Route.php";
require_once "./app/Auth.php";

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
                    <h2 class="content__title">Danh sách câu hỏi</h2>
                    <table>
                        <tr>
                            <th style="width: 5%">Id</th>
                            <th style="width: 30%">Nội dung</th>
                            <th style="width: 20%">Danh mục</th>
                            <th style="width: 15%">Tạo bởi</th>
                            <th style="width: 30%">Hoạt động</th>
                        </tr>
                        <?php
                        if (!empty($questions)) {
                            foreach ($questions as $question) {
                                $currentUser = Auth::user();
                                if ($currentUser->role_id == Role::OF['admin'] || $currentUser->role_id == Role::OF['staff'] || $question->creator()->id == $currentUser->id) {
                        ?>
                                <tr>
                                    <td><?= $question->id ?></td>
                                    <td><?= $question->content ?></td>
                                    <td><?= $question->category()->name ?? "Không có danh mục" ?></td>
                                    <td><?= $question->creator()->name ?? "Ẩn danh" ?></td>

                                    <td class="list__action">
                                        <?php
                                        if (Gate::can("view-question")) {
                                        ?>
                                            <a href="<?= Route::path('question.show', ['id' => $question->id]) ?>">Hiển thị</a>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (Gate::can("update-question")) {
                                        ?>
                                            <a href="<?= Route::path('question.edit', ['id' => $question->id]) ?>">Chỉnh sửa</a>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (Gate::can("delete-question")) {
                                        ?>
                                            <a href="<?= Route::path('question.delete', ['id' => $question->id]) ?>">Xóa</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                    </table>
                    <div class="content__listBtn">
                        <?php
                        if (Gate::can("create-question")) {
                        ?>
                            <a href="<?= Route::path('question.create') ?>" class="content__btnAdd">Thêm mới</a>
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