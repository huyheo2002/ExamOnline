<?php
require_once "app/Route.php";

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
                        <h2 class="content__title">Hiển thị câu hỏi</h2>
                        <?php
                        if (!empty($question)) {

                        ?>
                            <!-- form ảo :v -->
                            <div class="formClone">
                                <div class="item">
                                    <label for="">Id</label>
                                    <input type="text" placeholder="<?= $question->id ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Nội dung :</label>
                                    <input type="text" placeholder="<?= $question->content ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Danh mục :</label>
                                    <input type="text" placeholder="<?= $question->category()->name ?? "Không có danh mục" ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Tạo bởi :</label>
                                    <input type="text" placeholder="<?= $question->creator()->name ?? "Ẩn danh" ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="answers">Các câu trả lời :</label>
                                    <div name="answers[]" id="answers">
                                        <!-- Answer will be added here -->
                                        <?php
                                        $answers = $question->answers();
                                        if (!empty($answers)) {
                                            foreach ($answers as $count => $answer) {
                                        ?>
                                                <div class="check__wrap">
                                                    <input class="check_cb" type="radio" <?= $answer->correct ? "checked" : "" ?> disabled>
                                                    <textarea class="check__name" disabled><?= $answer->content ?></textarea>
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <p>Không có câu trả lời</p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="item">
                                    <label for="">Tạo lúc :</label>
                                    <input type="text" placeholder="<?= $question->created_at ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Cập nhật lúc :</label>
                                    <input type="text" placeholder="<?= $question->updated_at ?>" disabled>
                                </div>

                            <?php
                        }
                            ?>
                            <div class="content__listBtn flex-start">
                                <button class="content__btnExit btn-margin">
                                    <a href="<?= Route::path('question.index') ?>">Trở về</a>
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