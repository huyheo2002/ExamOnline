<?php
require_once "app/Route.php";
require_once "app/models/User.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "./resources/view/admin/partitions/head.php";
    ?>
    <link rel="stylesheet" href="./resources/css/form.css">
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
                        <h2 class="content__title">Hiển thị người dùng</h2>
                        <?php
                        if (!empty($user)) {
                            $link = "https://via.placeholder.com/150";
                            if (!empty($user->avatar)) {
                                clearstatcache();
                                if (file_exists(USER::AVATAR_PATH . $user->avatar)) {
                                    $link = "data:image/png; base64, " . base64_encode(file_get_contents(USER::AVATAR_PATH . $user->avatar));
                                }
                            }
                        ?>
                            <!-- form ảo :v -->
                            <div class="formClone">
                                <div class="item">
                                    <label for="">Id</label>
                                    <input type="text" placeholder="<?= $user->id ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Tên :</label>
                                    <input type="text" placeholder="<?= $user->name ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="email">Email :</label>
                                    <input type="email" placeholder="<?= $user->email ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="username">Username :</label>
                                    <input type="text" placeholder="<?= $user->username ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="password">Password :</label>
                                    <input type="password" placeholder="<?= $user->password ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="phone">Phone :</label>
                                    <input type="text" placeholder="<?= $user->phone ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="role_id">Vai trò :</label>
                                    <input type="text" placeholder="<?= $user->role()->name ?? "Không có vai trò" ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="avatar">Ảnh đại diện :</label>
                                    <img src="<?= $link ?>" alt="" style="max-width: 150px;">
                                </div>
                                <div class="item">
                                    <label for="">Tạo lúc :</label>
                                    <input type="text" placeholder="<?= $user->created_at ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Cập nhật lúc :</label>
                                    <input type="text" placeholder="<?= $user->updated_at ?>" disabled>
                                </div>

                            <?php
                        }
                            ?>
                            <div class="content__listBtn flex-start">
                                <button class="content__btnExit btn-margin">
                                    <a href="<?= Route::path('user.index') ?>">Trở về</a>
                                </button>
                            </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
</body>

</html>