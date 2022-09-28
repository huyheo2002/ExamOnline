<?php
require_once "./app/Route.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "./resources/view/admin/partitions/head.php";
    ?>
    <link rel="stylesheet" href="./resources/css/index.css">
    <link rel="stylesheet" href="./resources/css/dashboard.css">
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
                    <h1 class="dashboard">
                        Dashboard
                    </h1>
                    <div id="group">
                        <ul class="group__list">
                            <li class="group__list-item items__hover group__border"><a href="">
                                <div class="group__list-bg" style="background: url(./resources/images/main/home/dashboard-bgitem1.jpg) center/cover no-repeat;" >
                                    <div class="group__list-Overlay"></div>
                                </div>                                
                                <img src="./resources/images/main/home/dashboard-bgoverlay-exam-removebg-preview.png" alt="">
                                <div class="group__items-textShow-wrap">
                                    <p class="group__items-textShow">Quản lý đề thi</p>
                                    <p class="group__items-subtextShow"><?= count($exams ?? []) ?> đề thi</p>
                                </div>
                                
                            </a></li>
                            <li class="group__list-item items__hover group__border"><a href="">
                                <div class="group__list-bg" style="background: url(./resources/images/main/home/dashboard-bgitem2.jpg) center/cover no-repeat;">
                                    <div class="group__list-Overlay"></div>
                                </div>                                
                                <img src="./resources/images/main/home/dashboard-bgoverlay-question-removebg-preview.png" alt="">
                                <div class="group__items-textShow-wrap">
                                    <p class="group__items-textShow">Quản lý câu hỏi</p>
                                    <p class="group__items-subtextShow"><?= count($questions ?? []) ?> câu hỏi</p>
                                </div>
                            </a></li>                            
                            <li class="group__list-item items__hover group__border"><a href="">
                                <div class="group__list-bg" style="background: url(./resources/images/main/home/dashboard-bgitem-teacher.jpg) center/cover no-repeat;">
                                    <div class="group__list-Overlay"></div>
                                </div>                                
                                <img src="./resources/images/main/home/point-1.png" alt="">
                                <div class="group__items-textShow-wrap">
                                    <p class="group__items-textShow">Quản lý giáo viên</p>
                                    <p class="group__items-subtextShow"><?= count($teachers ?? []) ?> giáo viên</p>
                                </div>
                            </a></li>
                            <li class="group__list-item items__hover group__border"><a href="">
                                <div class="group__list-bg" style="background: url(./resources/images/main/home/dashboard-bgitem-student.jpg) center/cover no-repeat;">
                                    <div class="group__list-Overlay"></div>
                                </div>                                
                                <img src="./resources/images/main/home/doExam-poster.png" alt="">
                                <div class="group__items-textShow-wrap">
                                    <p class="group__items-textShow">Quản lý học viên</p>
                                    <p class="group__items-subtextShow"><?= count($students ?? []) ?> học viên</p>
                                </div>
                            </a></li>
                            <li class="group__list-item reloadgroup">
                                <div class="group__list-bg reloadgroup" style="background: url(./resources/images/main/home/dashboard-bgitem-reload.jpg) center no-repeat;"></div>
                                <p>Vui Lòng đợi</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
</body>
</html>