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
</head>

<body>
    <div id="main">
        <!-- header -->
        <?php
        include "./resources/view/partitions/header.php";
        ?>
        <div class="body">
            <!-- sidebar -->
            <?php
            include "./resources/view/partitions/sidebar.php";
            ?>
            <!-- content -->
            <div class="body__content">
                <div class="content__main show">
                    <div class="content__wrap">
                        <h1 class="exam__title">Tiêu đề bài thi</h1>
                        <div class="exam__question-wrap">
                            <h3 class="exam_count">Câu 1</h3>
                            <h3 class="exam__question">Helloooooooooooooooo Lorem ipsum dolor, sit amet
                                consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                                neque beatae iste nihil error fuga assumenda similique dolore blanditiis.consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                                neque beatae iste nihil error fuga assumenda similique dolore blanditiis.consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                                neque beatae iste nihil error fuga assumenda similique dolore blanditiis.
                            </h3>
                            <ul class="exam__list_answer">
                                <li class="exam__answer">
                                    <button class="btn__answer">Bình thường
                                        <span class="count__answer">1</span>
                                    </button>
                                </li>
                                <li class="exam__answer">
                                    <button class="btn__answer select">Chọn
                                        <span class="count__answer select">1</span>
                                    </button>
                                </li>
                                <li class="exam__answer">
                                    <button class="btn__answer correct">Đúng
                                        <span class="count__answer correct">1</span>
                                    </button>
                                </li>
                                <li class="exam__answer">
                                    <button class="btn__answer wrong">Sai
                                        <span class="count__answer wrong">1</span>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <!-- ques 2 -->
                        <div class="exam__question-wrap">
                            <h3 class="exam_count">Câu 2</h3>
                            <h3 class="exam__question">Helloooooooooooooooo Lorem ipsum dolor, sit amet
                                consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                                neque beatae iste nihil error fuga assumenda similique dolore blanditiis.consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                                neque beatae iste nihil error fuga assumenda similique dolore blanditiis.consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                                neque beatae iste nihil error fuga assumenda similique dolore blanditiis.
                            </h3>
                            <ul class="exam__list_answer">
                                <li class="exam__answer">
                                    <button class="btn__answer">Bình thường
                                        <span class="count__answer">1</span>
                                    </button>
                                </li>
                                <li class="exam__answer">
                                    <button class="btn__answer select">Chọn
                                        <span class="count__answer select">1</span>
                                    </button>
                                </li>
                                <li class="exam__answer">
                                    <button class="btn__answer correct">Đúng
                                        <span class="count__answer correct">1</span>
                                    </button>
                                </li>
                                <li class="exam__answer">
                                    <button class="btn__answer wrong">Sai
                                        <span class="count__answer wrong">1</span>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <!-- ques3 -->
                        <div class="exam__question-wrap">
                            <h3 class="exam_count">Câu 3</h3>
                            <h3 class="exam__question">Helloooooooooooooooo Lorem ipsum dolor, sit amet
                                consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                                neque beatae iste nihil error fuga assumenda similique dolore blanditiis.consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                                neque beatae iste nihil error fuga assumenda similique dolore blanditiis.consectetur adipisicing elit. Magni quod dolorem error? Soluta rem eaque sit accusantium eligendi voluptatibus odio,
                                neque beatae iste nihil error fuga assumenda similique dolore blanditiis.
                            </h3>
                            <ul class="exam__list_answer">
                                <li class="exam__answer">
                                    <button class="btn__answer">Bình thường
                                        <span class="count__answer">1</span>
                                    </button>
                                </li>
                                <li class="exam__answer">
                                    <button class="btn__answer select">Chọn
                                        <span class="count__answer select">1</span>
                                    </button>
                                </li>
                                <li class="exam__answer">
                                    <button class="btn__answer correct">Đúng
                                        <span class="count__answer correct">1</span>
                                    </button>
                                </li>
                                <li class="exam__answer">
                                    <button class="btn__answer wrong">Sai
                                        <span class="count__answer wrong">1</span>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="content__listBtn">
                            <input type="submit" value="Thoát" class="content__btnAdd">
                            <a class="content__btnExit" href="#">Nộp bài</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>