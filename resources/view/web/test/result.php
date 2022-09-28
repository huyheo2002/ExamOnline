<?php
require_once "./app/Route.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "./resources/view/partitions/head.php";
    ?>
    <link rel="stylesheet" href="./resources/css/student.css">
    <link rel="stylesheet" href="./resources/css/student-doexam.css">

</head>

<body>
    <div id="main">
        <!-- header -->
        <?php
        include "./resources/view/partitions/header.php";
        ?>
        <!-- content -->
        <div class="body__content doExam">
            <div class="content__main show">
                <div class="content__wrap">
                    <div class="modal__close js-modal-close">
                        <a href="<?= Route::path("test.index") ?>">
                            <i class="fas fa-times modal__close-ic"></i>
                        </a>
                    </div>

                    <div class="modal__content">
                        <h2 class="modal__content-welcome">
                            Chúc mừng bạn đã hoàn thành bài thi
                        </h2>
                        <h4 class="modal__content-title">
                            <?= $correctCount ?>/<?= $questionCount ?> Câu hỏi
                        </h4>
                    </div>

                    <div class="modal__point">
                        <img src="./resources/images/main/home/doExam-poster.png" alt="" class="point-1">
                        <img src="./resources/images/main/home/point-1.png" alt="" class="point-2">
                        <img src="./resources/images/main/home/show-point.png" alt="" class="point-3">
                        <span class="modal__point-result">
                            Bạn đã đạt được <?= $correctCount/$questionCount * 10 ?> điểm
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>