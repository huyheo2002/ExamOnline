<?php
require_once "./app/Route.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "./resources/view/partitions/head.php";
    ?>

    <!-- Custom Css -->
    <link rel="stylesheet" href="./resources/css/profile.css">
</head>

<body>
    <?php
    include "./resources/view/partitions/header.php";
    ?>

    <!-- Sidenav -->
    <!-- End -->

    <!-- Main -->
    <?php
    if ($user !== null) {
    ?>
        <div class="main-content">
            <div class="profile">
                <div class="card">
                    <div class="card-body">
                        <img src="<?= $user->getAvatarLink() ?>" alt="" width="150" height="150">
                        <div class="name">
                            <?= $user->name ?>
                        </div>
                        <div class="job">
                            <?= $user->role()->name ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info">
                <div class="card">
                    <h2>Thông tin cá nhân</h2>
                    <div class="card-body">
                        <i class="fa fa-pen fa-xs edit"></i>
                        <form action="<?= Route::path("profile.update") ?>" method="post" enctype="multipart/form-data">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Tên</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="name" id="name" value="<?= $user->name ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>
                                            <input type="email" name="email" id="email" value="<?= $user->email ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tài khoản</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="username" id="username" value="<?= $user->username ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mật khẩu</td>
                                        <td>:</td>
                                        <td>
                                            <input type="password" name="password" id="password" value="<?= $user->password ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="phone" id="phone" value="<?= $user->phone ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Vai trò</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="role_id" id="role_id" value="<?= $user->role()->name ?? 'Không có vai trò' ?>" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Avatar</td>
                                        <td>:</td>
                                        <td><input type="file" name="avatar" id="avatar"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="action">
                                <input type="submit" value="Lưu">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- <h2>Tài khoản mạng xã hội</h2>
            <div class="card">
                <div class="card-body">
                    <i class="fa fa-pen fa-xs edit"></i>
                    <div class="social-media">
                        <span class="fa-stack fa-sm">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                        </span>
                        <span class="fa-stack fa-sm">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                        <span class="fa-stack fa-sm">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                        </span>
                        <span class="fa-stack fa-sm">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-invision fa-stack-1x fa-inverse"></i>
                        </span>
                        <span class="fa-stack fa-sm">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                        </span>
                        <span class="fa-stack fa-sm">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                        </span>
                        <span class="fa-stack fa-sm">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-snapchat fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                </div>
            </div> -->
            </div>
        </div>
        <!-- End -->
    <?php
    }
    ?>
</body>

</html>