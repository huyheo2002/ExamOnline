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
                        <h2 class="content__title">Hiển thị đề thi</h2>
                        <?php
                        if (!empty($exam)) {

                        ?>
                            <!-- form ảo :v -->
                            <div class="formClone">
                                <div class="item">
                                    <label for="">Id</label>
                                    <input type="text" placeholder="<?= $exam->id ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Nội dung :</label>
                                    <input type="text" placeholder="<?= $exam->name ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Danh mục :</label>
                                    <input type="text" placeholder="<?= $exam->category()->name ?? "Không có danh mục" ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Tạo bởi :</label>
                                    <input type="text" placeholder="<?= $exam->creator()->name ?? "Ẩn danh" ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="questions">Các câu hỏi :</label>
                                    <div name="questions[]" id="questions">
                                        <?php
                                        $questions = $exam->questions();
                                        if (!empty($questions)) {
                                            foreach ($questions as $count => $question) {
                                        ?>
                                                <div class="check__wrap">
                                                    <input class="check_cb" type="checkbox" name="question_ids[]" id="chk_question_<?= $question->id ?>" value="<?= $question->id ?>" checked disabled>
                                                    <label for="chk_question_<?= $question->id ?>" class="check__name"><?= $question->content ?></label>
                                                </div>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <p>Không có câu hỏi</p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="item">
                                    <label for="">Tạo lúc :</label>
                                    <input type="text" placeholder="<?= $exam->created_at ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Cập nhật lúc :</label>
                                    <input type="text" placeholder="<?= $exam->updated_at ?>" disabled>
                                </div>

                            <?php
                        }
                            ?>
                            <div class="content__listBtn flex-start">
                                <button class="content__btnExit btn-margin">
                                    <a href="<?= Route::path('exam.index') ?>">Trở về</a>
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