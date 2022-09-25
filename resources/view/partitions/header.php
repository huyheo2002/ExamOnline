<?php
require_once "./app/Route.php";
require_once "./app/Auth.php";
require_once "./app/models/Role.php";
?>

<ul class="header nav nav-tabs">
    <li class="nav-item">
        <a class="header__logo nav-link active" href="#">
            <img src="./resources/images/main/logo/logoHuyExam-nobg-white.png" alt="">
        </a>
    </li>
    <?php
    if (Auth::check()) {
    ?>
        <li class="nav-item dropdown">
            <a class="header__avtUser nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle" src="<?= Auth::user()->getAvatarLink() ?>" alt="">
            </a>
            <div class="dropdown-menu">
                <?php
                if (Auth::user()->role_id != Role::OF["student"]) {
                ?>
                    <a class="dropdown-item" href="<?= Route::path('admin') ?>">Vào giao diện quản lý</a>
                <?php
                }
                ?>
                <a class="dropdown-item" href="<?= Route::path('profile') ?>">Hồ sơ của bạn</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= Route::path('logout') ?>">Đăng xuất</a>
            </div>
        </li>
    <?php
    } else {
    ?>
        <li class="nav-item d-flex align-items-center">
            <a href="<?= Route::path('login') ?>" class="nav-link">Đăng nhập</a>
        </li>
    <?php
    }
    ?>

</ul>