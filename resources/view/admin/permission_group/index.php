<?php
require_once "./app/Route.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "./resources/view/partitions/head.php";
    ?>
</head>
<body>
    <div id="main">
        <!-- <div class="header">This is Header :v</div> -->
        <div class="body">
            <?php
                include "./resources/view/partitions/sidebar.php";
            ?>
            <div class="body__content">
                <?php
                    include "./resources/view/partitions/header.php";
                    ?>
                <div class="content__main show">
                    <h2 class="content__title">Danh sách nhóm quyền</h2>
                    <table>
                        <tr>
                            <th style="width: 10%">id</th>
                            <th style="width: 50%">name</th>
                            <th style="width: 40%">action</th>
                        </tr>
                    <?php
                        if(!empty($permissionGroups)) {
                            foreach ($permissionGroups as $permissionGroup) {
                                
                            
                    ?>
                        <tr>
                            <td><?= $permissionGroup["id"] ?></td>
                            <td><?= $permissionGroup["name"] ?></td>
                            <td>
                                <a href="<?= Route::root() . "?page=permission-group.show&id=" . $permissionGroup['id'] ?>">Show</a>
                                <a href="<?= Route::root() . "?page=permission-group.edit&id=" . $permissionGroup['id'] ?>">Edit</a>
                                <a href="<?= Route::root() . "?page=permission-group.delete&id=" . $permissionGroup['id'] ?>">Delete</a>
                            </td>
                        </tr>                        
                    <?php
                            }
                        }
                    ?>
                    </table>
                    <div class="content__listBtn">
                        <a href="<?= Route::root() . '?page=permission-group.create' ?>" class="content__btnAdd">Insert</a>
                        <button class="content__btnExit">Exit</button>                    
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
</body>
</html>