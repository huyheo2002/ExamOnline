<?php
require_once "./app/Route.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-favico" href="./resources/images/main/logo/favicon.ico">
    <!-- index gọi file này -->
    <!-- <link rel="stylesheet" href="./resources/css/login.css"> -->
    <link rel="stylesheet" href="./resources/css/login.css">
</head>
<body>
    <div class="overlay">
        <!-- ./app/controllers/auth/login.php :v -->
        <form action="?page=doLogin" method="POST">
            <div class="con">
                <header class="head-form">
                    <img src="./resources/images/main/logo/logoHuyExam-nobg.png" alt="">
                    <!-- <h2>Log In</h2>
                    <p>login here using your username and password</p> -->
                </header>
                <br>
                <div class="field-set">
                    <div class="input-wrap">
                        <span class="input-item">
                            <i class="fa fa-user-circle"></i>
                        </span>
                        <input class="form-input" id="txt-input" type="text" placeholder="@UserName" name= "username" required>
                    </div>
                    <br>
                    <div class="input-wrap">
                        <span class="input-item">
                            <i class="fa fa-key"></i>
                        </span>
                        <input class="form-input" type="password" placeholder="Password" id="pwd"  name="password" required>
                        <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
                    </div>                    
                    <br>
                    <button class="log-in"> Log In </button>
                </div>
            
                <div class="other">
                    <button class="btn submits frgt-pass">Forgot Password</button>
                    <button class="btn submits sign-up">
                        <a href=<?= Route::path('register') ?> style="width: 100%; height: 100%; display: block; line-height: 48px; text-decoration: none; color: #252537;">
                            Sign Up 
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </a>
                    </button>
                </div>
            </div>        
        </form>
    </div>
    <script src="./resources/js/login.js"></script>
</body>
</html>