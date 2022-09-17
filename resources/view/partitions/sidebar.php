<?php
    require_once "./app/Route.php";
?>

<div class="body__sidebar">
    <div class="body__sidebar_logo">                    
        <img src="./resources/images/main/logo/logoHuyExam-nobg.png" alt="">
    </div>
    <ul class="body__sidebar_list">
        <li><a href="<?= Route::path('permission-group.index') ?>">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý nhóm quyền</p>
        </a></li>
        <li><a href="<?= Route::path('permission.index') ?>">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý quyền</p>
        </a></li>
        <li><a href="<?= Route::path('permission-group.create') ?>">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý người dùng</p>
        </a></li>
        <li><a href="<?= Route::path('permission-group.create') ?>">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý vai trò</p>
        </a></li>
    </ul>
</div>