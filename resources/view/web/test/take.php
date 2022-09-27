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
                <form class="content__wrap" method="POST" action="<?= Route::path("test.eval") ?>">
                    <h1 class="exam__title">Tiêu đề bài thi</h1>
                    <!-- <div class="exam__question-wrap">
                        <h3 class="exam_count">Câu 1</h3>
                        <h3 class="exam__question">Helloooooooooooooooo Lorem ipsum dolor, sit amet
                            consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                            neque beatae iste nihil error fuga assumenda similique dolore blanditiis.consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                            neque beatae iste nihil error fuga assumenda similique dolore blanditiis.consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                            neque beatae iste nihil error fuga assumenda similique dolore blanditiis.
                        </h3>
                        <ul class="exam__list_answer">
                            <li class="exam__answer">
                                <button class="btn__answer">Helloooooooooooooooo Lorem ipsum dolor, sit amet
                                    consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                                    neque beatae iste nihil error fuga assumenda similique dolore blanditiis.consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                                    neque beatae iste nihil error fuga assumenda similique dolore blanditiis.consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                                    neque beatae iste nihil error fuga assumenda similique dolore blanditiis.
                                    <span class="count__answer">1</span>
                                </button>
                            </li>
                            <li class="exam__answer">
                                <button class="btn__answer select">Chọn
                                    <span class="count__answer select">2</span>
                                </button>
                            </li>
                            <li class="exam__answer">
                                <button class="btn__answer correct">Đúng
                                    <span class="count__answer correct">3</span>
                                </button>
                            </li>
                            <li class="exam__answer">
                                <button class="btn__answer wrong">Sai
                                    <span class="count__answer wrong">4</span>
                                </button>
                            </li>
                        </ul>
                    </div> -->

                    <input type="hidden" name="exam_id" value="<?= $_GET["id"] ?>">
                    <?php
                    if (!empty($questions)) {
                        $questionCount = 1;
                        foreach ($questions as $question) {
                    ?>
                            <div class="exam__question-wrap">
                                <h3 class="exam_count">Câu <?= $questionCount++ ?></h3>
                                <h3 class="exam__question"><?= $question->content ?></h3>
                                <ul class="exam__list_answer">
                                    <?php
                                    $answers = $question->answers();
                                    if (!empty($answers)) {
                                        $answerCount = 1;
                                        foreach ($answers as $answer) {
                                    ?>
                                            <li class="exam__answer">
                                                <input type="radio" name="answers[<?= $question->id ?>]" value="<?= $answer->id ?>" id="rad_<?= $question->id ?>_<?= $answer->id ?>">
                                                <label for="rad_<?= $question->id ?>_<?= $answer->id ?>" class="btn__answer">
                                                    <?= $answer->content ?>
                                                    <span class="count__answer"><?= $answerCount++ ?></span>
                                                </label>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>

                    <?php
                        }
                    }
                    ?>


                    <div class="content__listBtn">
                        <a class="content__btnExit" href="<?= Route::path("test.index") ?>">Thoát</a>
                        <input type="submit" value="Nộp bài" class="content__btnAdd">
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>