<?php
require_once "./app/Route.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-favico" href="./resources/images/main/logo/favicon.ico">
    <title>Huy Exam</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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