<?php


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
                        <h2 class="content__title">Hiển thị vai trò</h2>                    
                        <?php
                            if(!empty($role)) {                            
                                                        
                        ?>
                            <!-- form ảo :v -->
                            <div class="formClone">
                                <div class="item">
                                    <label for="">Id</label>
                                    <input type="text" placeholder="<?= $role["id"] ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Tên :</label>
                                    <input type="text" placeholder="<?= $role["name"] ?>" disabled>
                                </div>
                                <?php 
                                    $selectedPermissions = [];
                                    if(!empty($role["permissions"])) {
                                        $selectedPermissions = array_map(fn($permission) => $permission["id"] ?? 0, $role["permissions"]);
                                    }                                    
                                ?>
                                <div class="item">
                                    <label for="permission">Quyền :</label>
                                    <div class="">
                                        <?php
                                        if (!empty($permissionGroups)) {
                                            foreach ($permissionGroups as $permissionGroup) {
                                        ?>
                                                <h3 class="check__title"><?= $permissionGroup["name"]?>; </h3>
                                                <?php
                                                if (!empty($permissionGroup["permissions"])) {
                                                    foreach ($permissionGroup["permissions"] as $permission) {
                                                ?>
                                                    <div class="check__wrap">
                                                        <input class="check_cb" type="checkbox" name="permission_ids[]" id="chk_permission_<?= $permission['id'] ?>" value="<?= $permission["id"] ?>" <?= in_array($permission["id"], $selectedPermissions) ? "checked" : "" ?> disabled>
                                                        <label for="chk_permission_<?= $permission['id'] ?>" class="check__name"><?= $permission["name"] ?></label>
                                                    </div>
                                        <?php
                                                    }
                                                }
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="item">
                                    <label for="">Tạo lúc :</label>
                                    <input type="text" placeholder="<?= $role["created_at"] ?>" disabled>
                                </div>
                                <div class="item">
                                    <label for="">Cập nhật lúc :</label>
                                    <input type="text" placeholder="<?= $role["updated_at"] ?>" disabled>
                                </div>
                                                        
                        <?php 
                            }
                        ?>
                                <div class="content__listBtn flex-start">
                                    <button class="content__btnExit btn-margin">
                                        <a href="<?= Route::path('role.index') ?>">Trở về</a>
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