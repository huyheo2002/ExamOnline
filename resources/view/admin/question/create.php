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
                        <h2 class="content__title">Thêm mới câu hỏi</h2>
                        <form action="<?= Route::path('question.store') ?>" method="POST">
                            <div class="item">
                                <label for="id">ID :</label>
                                <input type="text" name="id" id="id" disabled placeholder="Không cần nhập dữ liệu ở đây">
                            </div>
                            <div class="item">
                                <label for="content">Nội dung :</label>
                                <textarea name="content" id="content"></textarea>
                            </div>
                            <div class="item">
                                <label for="category_id">Danh mục :</label>
                                <select name="category_id" id="category_id">
                                    <?php
                                    if (!empty($categories)) {
                                        foreach ($categories as $category) {
                                    ?>
                                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="item">
                                <label for="answers">Các câu trả lời :</label>
                                <button id="addAnswer">
                                    Thêm câu trả lời
                                </button>
                                <div name="answers[]" id="answers">
                                    <!-- Answer will be added here -->
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
                                <a class="content__btnExit" href="<?= Route::path('question.index') ?>">Trở về</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>

    <script src="./resources/js/appendAnswer.js" type="module"></script>
</body>

</html>