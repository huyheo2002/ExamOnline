<?php
require_once "./app/Route.php";
require_once "./app/Auth.php";
require_once "./app/models/Role.php";
?>

<ul class="header nav nav-tabs">
    <div class="nav-item"></div>
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
                <a class="dropdown-item" href="<?= Route::path('profile.show') ?>">Hồ sơ của bạn</a>
                <a class="dropdown-item" href="<?= Route::path('test.history') ?>">Lịch sử làm bài của bạn</a>
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