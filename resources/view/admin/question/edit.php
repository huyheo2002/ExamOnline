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
                        <h2 class="content__title">Chỉnh sửa câu hỏi</h2>
                        <?php
                        if (!empty($question)) {

                        ?>
                            <form action="<?= Route::path('question.update', ['id' => $question->id]) ?>" method="POST">
                                <div class="item">
                                    <label for="id">Id :</label>
                                    <input value="<?= $question->id ?>" type="text" name="id" id="id" disabled>
                                </div>
                                <div class="item">
                                    <label for="content">Nội dung :</label>
                                    <input value="<?= $question->content ?>" type="text" name="content" id="content">
                                </div>
                                <div class="item">
                                    <label for="category_id">Danh mục :</label>
                                    <select name="category_id" id="category_id" style="padding: 5px; font-size: 14px;">
                                        <?php
                                        if (!empty($categories)) {
                                            foreach ($categories as $category) {
                                        ?>
                                                <option value="<?= $category->id ?>" <?= ($category->id == $question->category_id) ? "selected" : "" ?>><?= $category->name ?></option>
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
                                        <?php
                                        $answers = $question->answers();
                                        if (!empty($answers)) {
                                            foreach ($answers as $count => $answer) {
                                        ?>
                                                <div class="check__wrap">
                                                    <input class="check_cb" type="radio" name="answers[correct]" value="<?= $count ?>" <?= $answer->correct ? "checked" : "" ?>>
                                                    <textarea class="check__name" name="answers[content][<?= $count ?>]"><?= $answer->content ?></textarea>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="item">
                                    <label for="created_at">Tạo lúc :</label>
                                    <input value="<?= $question->created_at ?>" type="text" name="created_at" id="created_at" disabled>
                                </div>
                                <div class="item">
                                    <label for="updated_at">Cập nhật lúc :</label>
                                    <input value="<?= $question->updated_at ?>" type="text" name="updated_at" id="updated_at" disabled>
                                </div>

                                <div class="content__listBtn">
                                    <input type="submit" value="Cập nhật" class="content__btnAdd">
                                    <a class="content__btnExit" href="<?= Route::path('question.index') ?>">Trở về</a>
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
    <script src="./resources/js/appendAnswer.js" type="module"></script>
</body>

</html>