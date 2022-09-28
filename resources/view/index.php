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
            <!-- content -->
            <div class="body__content-bg">
                <div class="body__content">
                    <div class="body__content-title">
                        Chào mừng đến 
                        <br>
                        Huy Exam
                    </div>    
                    <div class="body__content-slogan">
                        Nền tảng thi trực tuyến số 1 Việt Nam dành cho mọi lứa tuổi
                    </div>
                    <div class="body__content-btnWrap">
                        <button class="custom-btn btn-9"><a href="<?= Route::path('test.index') ?>">
                            Click Me :V
                        </a></button>
                    </div>
                    <div class="body__content-bottom">
                        <img src="./resources/images/main/home/bg-overlay.png" alt="">
                        <div class="body__content-desc">
                            <div class="content-desc-wrap">
                                <div class="iconwrap">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                                <span>Nguồn tài liệu phong phú đa dạng với hơn 500+ đề thi.</span>
                            </div>
                            <div class="content-desc-wrap">
                                <div class="iconwrap">
                                    <i class="fa-solid fa-person-chalkboard"></i>                                
                                </div>
                                <span>Hơn 100 giáo viên xuất sắc trên khắp cả nước ra đề.</span>
                            </div>
                            <div class="content-desc-wrap">
                                <div class="iconwrap">
                                    <i class="fa-solid fa-user-graduate"></i>
                                
                                </div>
                                <span>Có sự góp mặt của hơn 2000+ học viên.</span>
                            </div>
                            <div class="content-desc-wrap">
                                <div class="iconwrap">
                                    <i class="fa-solid fa-person-running"></i>                                    
                                </div>
                                <span>Làm bài mượt mà nhận kết quả trong tích tắc.</span>
                            </div>                            
                        </div>
                    </div>
                </div>                              
            </div>
        </div>
    </div>
</body>

</html>