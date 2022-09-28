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
    <link rel="stylesheet" href="./resources/css/history.css">
</head>

<body>
    <div id="main">
        <!-- header -->
        <?php
        include "./resources/view/partitions/header.php";
        ?>
        <!-- content -->
        <div class="body__content doExam">
            <div class="history__title">
                Lịch sử thi của bạn
            </div>
            <div class="content__main">
                <table>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tên bài thi</th>
                        <th>Điểm thi</th>
                        <th>Ngày thi</th>
                    </tr>
                    <?php
                    if ($historyExams != null && !empty($historyExams)) {
                        foreach ($historyExams as $historyExam) {
                    ?>
                            <tr>
                                <td><?= $historyExam->name ?></td>
                                <td><?= $historyExam->category()->name ?? "Không có danh mục" ?></td>
                                <td><?= $historyExam->result ?></td>
                                <td><?= $historyExam->created_at ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
                <div class="content__listBtn">
                    <button class="content__btnExit">
                        <a href="<?= Route::path('login') ?>">Thoát</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>