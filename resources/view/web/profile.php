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

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>