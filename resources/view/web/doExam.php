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
                        </div>

                        <!-- ques 2 -->
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
                                    <button class="btn__answer">Chọn
                                        <span class="count__answer">2</span>
                                    </button>
                                </li>
                                <li class="exam__answer">
                                    <button class="btn__answer">Đúng
                                        <span class="count__answer">3</span>
                                    </button>
                                </li>
                                <li class="exam__answer">
                                    <button class="btn__answer">Sai
                                        <span class="count__answer">4</span>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <!-- ques3 -->
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
                                    <button class="btn__answer">Chọn
                                        <span class="count__answer">2</span>
                                    </button>
                                </li>
                                <li class="exam__answer">
                                    <button class="btn__answer">Đúng
                                        <span class="count__answer">3</span>
                                    </button>
                                </li>
                                <li class="exam__answer">
                                    <button class="btn__answer">Sai
                                        <span class="count__answer">4</span>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="content__listBtn">
                            <input type="submit" value="Thoát" class="content__btnAdd">
                            <a class="content__btnExit js-point">Nộp bài</a>
                        </div>
                    </div>

                </div>
            </div>
    </div>

    <!-- Modal -->
    <div class="modal js-modal">
        <div class="modal__container js-modalContainer">
            <div class="modal__header">
                <img src="./resources/images/main/logo/logoHuyExam-nobg-white.png" alt="">
            </div>

            <div class="modal__close js-modal-close">
                <i class="fas fa-times modal__close-ic"></i>
            </div> 
            
            <div class="modal__content">
                <h2 class="modal__content-welcome">
                    Chúc mừng bạn đã hoàn thành bài thi
                </h2>
                <h4 class="modal__content-title">
                    1/50 Câu hỏi
                </h4>
            </div>

            <div class="modal__point">
                <img src="./resources/images/main/home/doExam-poster.png" alt="" class="point-1">
                <img src="./resources/images/main/home/point-1.png" alt="" class="point-2">
                <img src="./resources/images/main/home/show-point.png" alt="" class="point-3">
                <span class="modal__point-result">
                    Bạn đã đạt được 2 điểm
                </span>
            </div>
        </div>
    </div>
</body>

<script>
    // phần modal
    const pointHead = document.querySelector(".js-point")
    const modal = document.querySelector(".js-modal")
    const modalContainer = document.querySelector(".js-modalContainer")
    const modalClose =document.querySelector(".js-modal-close")

    // hàm hiển thị modal point (thêm class open vào modal)
    function showModalpoint () {
        modal.classList.add("open")
    }

    // hàm ẩn modal point (xóa class open khỏi của modal)
    function hideModalpoint () {
        modal.classList.remove("open")
    }

    // nghe hành vi click vào phần point trên header
    pointHead.addEventListener ("click", showModalpoint)

    // nghe hành vi click vào phần close trong modal
    modalClose.addEventListener ("click",hideModalpoint)

    modal.addEventListener("click",hideModalpoint )

    modalContainer.addEventListener ("click", function(event) {
        event.stopPropagation()
    })
</script>

</html>