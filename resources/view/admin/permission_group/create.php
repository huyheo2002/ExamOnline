<?php
    require_once "./app/Route.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "./resources/view/partitions/head.php";
    ?>
</head>
<body>
    <div id="main">
        <!-- <div class="header">This is Header :v</div> -->
        <div class="body">
            <?php
                include "./resources/view/partitions/sidebar.php";
            ?>
            <div class="body__content">
                <?php
                    include "./resources/view/partitions/header.php";
                    ?>
                <div class="content__main show">
                    <h2 class="content__title">Thêm mới nhóm quyền</h2>
                    
                    <form action="<?= Route::root() . '?page=permission-group.store' ?>" method="POST">
                        <div class="">
                            <label for="id">id</label>
                            <input type="text" name="id" id="id" disabled>
                        </div>
                        <div class="">
                            <label for="name">name</label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="">
                            <label for="created_at">created_at</label>
                            <input type="text" name="created_at" id="created_at" disabled>
                        </div>
                        <div class="">
                            <label for="updated_at">updated_at</label>
                            <input type="text" name="updated_at" id="updated_at" disabled>
                        </div>
                    
                   
                        <div class="content__listBtn">
                            <input type="submit" value="Submit" class="content__btnAdd">
                            <a class="content__btnExit" href="#">Exit</a>                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
</body>
</html>