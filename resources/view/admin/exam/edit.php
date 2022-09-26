<?php
require_once "./app/Route.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "./resources/view/admin/partitions/head.php";
    ?>
    <link rel="stylesheet" href="./resources/css/form.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                        <h2 class="content__title">Chỉnh sửa đề thi</h2>
                        <?php
                        if (!empty($exam)) {

                        ?>
                            <form action="<?= Route::path('exam.update', ['id' => $exam->id]) ?>" method="POST">
                                <div class="item">
                                    <label for="id">Id :</label>
                                    <input value="<?= $exam->id ?>" type="text" name="id" id="id" disabled>
                                </div>
                                <div class="item">
                                    <label for="name">Nội dung :</label>
                                    <input value="<?= $exam->name ?>" type="text" name="name" id="name">
                                </div>
                                <div class="item">
                                    <label for="category_id">Danh mục :</label>
                                    <select name="category_id" id="category_id">
                                        <option value="" disabled hidden>---</option>
                                        <?php
                                        if (!empty($categories)) {
                                            foreach ($categories as $category) {
                                        ?>
                                                <option value="<?= $category->id ?>" <?= ($category->id == $exam->category_id) ? "selected" : "" ?>><?= $category->name ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="item">
                                    <label for="questions">Các câu trả lời :</label>
                                    <div name="questions[]" id="questions">
                                        <!-- Question will be added here -->
                                        <?php
                                        $questions = ($exam->category() !== null) ? $exam->category()->questions() : [];
                                        $selectedQuestionIds = array_map(fn ($question) => $question->id, $exam->questions());
                                        if (!empty($questions)) {
                                            foreach ($questions as $count => $question) {
                                        ?>
                                                <div class="check__wrap">
                                                    <input class="check_cb" type="checkbox" name="question_ids[]" id="chk_question_<?= $question->id ?>" value="<?= $question->id ?>" <?= in_array($question->id, $selectedQuestionIds) ? "checked" : "" ?>>
                                                    <label for="chk_question_<?= $question->id ?>" class="check__name"><?= $question->content ?></label>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="item">
                                    <label for="created_at">Tạo lúc :</label>
                                    <input value="<?= $exam->created_at ?>" type="text" name="created_at" id="created_at" disabled>
                                </div>
                                <div class="item">
                                    <label for="updated_at">Cập nhật lúc :</label>
                                    <input value="<?= $exam->updated_at ?>" type="text" name="updated_at" id="updated_at" disabled>
                                </div>

                                <div class="content__listBtn">
                                    <input type="submit" value="Cập nhật" class="content__btnAdd">
                                    <a class="content__btnExit" href="<?= Route::path('exam.index') ?>">Trở về</a>
                                </div>
                            </form>

                        <?php
                        }

                        ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
    <script>
        var url = "<?= Route::path("getQuestionsFromCategory") ?>";
    </script>
    <script src="./resources/js/ajaxQuestionCategory.js" type="module"></script>
</body>

</html>