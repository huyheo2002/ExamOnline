<?php
    require_once "./app/Route.php";
?>

<div class="body__sidebar">
    <div class="body__sidebar_logo">
        <a href="<?= Route::root() ?>">
            <img src="./resources/images/main/logo/logoHuyExam-nobg.png" alt="">
        </a>                    
    </div>
    <h3 class="sidebar__title">Quản lý hệ thống</h3>
    <ul class="body__sidebar_list">
        <li><a href="<?= Route::path('permission-group.index') ?>">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý nhóm quyền</p>
        </a></li>
        <li><a href="<?= Route::path('permission.index') ?>">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý quyền</p>
        </a></li>
        <li><a href="<?= Route::path('user.index') ?>">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý người dùng</p>
        </a></li>
        <li><a href="<?= Route::path('role.index') ?>">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý vai trò</p>
        </a></li>
    </ul>
    <h3 class="sidebar__title">Quản lý ngân hàng đề thi</h3>
    <ul class="body__sidebar_list">
        <li><a href="<?= Route::path('category.index') ?>">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý danh mục</p>
        </a></li>
        <li><a href="<?= Route::path('permission.index') ?>">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý câu hỏi</p>
        </a></li>
        <li><a href="<?= Route::path('user.index') ?>">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý đề thi</p>
        </a></li>
        <li><a href="<?= Route::path('role.index') ?>">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý đáp án</p>
        </a></li>
    </ul>
</div>