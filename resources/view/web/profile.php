<?php
require_once "./app/Route.php";
require_once "./app/Auth.php";
require_once "./app/models/Role.php";
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
    <!-- Navbar top -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex">
        <a class="navbar-brand" href="#">
            <img src="./resources/images/main/logo/logoHuyExam-nobg.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="title">
            <h1>Profile</h1>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Người dùng
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>                
            </ul>            
        </div>
    </nav>

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
            <img src="https://imdezcode.files.wordpress.com/2020/02/imdezcode-logo.png" alt="" width="100" height="100">

            <div class="name">
                Huy Admin :V
            </div>
            <div class="job">
                Quản lý hệ thống
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main-content">
        <h2>Thông tin cá nhân</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <table>
                    <tbody>
                        <tr>
                            <td>Tên</td>
                            <td>:</td>
                            <td>Huy</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>huy12@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>:</td>
                            <td>Hà nội</td>
                        </tr>
                        <tr>
                            <td>Tài khoản</td>
                            <td>:</td>
                            <td>huyAdmin</td>
                        </tr>
                        <tr>
                            <td>Mật khẩu</td>
                            <td>:</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>:</td>
                            <td>0123456</td>
                        </tr>
                        <tr>
                            <td>Vai trò</td>
                            <td>:</td>
                            <td>Admin</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h2>Tài khoản mạng xã hội</h2>
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
        </div>
    </div>
    <!-- End -->
</body>

</html>