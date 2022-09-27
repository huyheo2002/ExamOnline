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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                <div class="container-fluid">
                    <label for="category_id">
                        Chọn chủ đề
                    </label> 
                    <select name="category_id" id="category_id">
                        <option value="" selected disabled hidden>---</option>
                        <?php
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                        ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="container-fluid">
                    <ul id="exams">
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        var ajaxUrl = "<?= Route::path("getExamsFromCategory") ?>";
        var showUrl = "<?= Route::path("test.take") ?>";
    </script>
    <script src="./resources/js/ajaxListExamCategory.js"></script>
</body>

</html>