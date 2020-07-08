<?php
    require "models/menu/functions.php";
?>

<div class="container" style="padding-top: 120px">
    <div class="row">
        <div class="title-errors">
            <h2>Menu <a href="index.php?page=menu-add"><i class="fas fa-plus-circle"></i></a></h2></h2>
            <?php
                if(isset($_SESSION['errors'])) {
                    $err = $_SESSION['errors'];
                    echo ("<p class='alert alert-danger'>" . $err . "</p>");
                    unset($_SESSION['errors']);
                }
                if(isset($_SESSION['success'])) {
                    $succ = $_SESSION['success'];
                    echo ("<p class='alert alert-success'>" . $succ . "</p>");
                    unset($_SESSION['success']);
                }
            ?>

        <table id="menu-table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">href</th>
                <th scope="col">Options</th>
                </tr>
            </thead>
            <?php
                $i = 0;
                $menuItems = getMenus();
                foreach($menuItems as $m):
                    $i++;
            ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$m->name?></td>
                <td><?=$m->src?></td>
                <td><a href="index.php?page=menu-edit&id=<?=$m->id?>"><i class="fas fa-edit"></i></a><i class="fas fa-minus-square menu-delete" data-id=<?=$m->id?>></i></td>
            </tr>
            <?php endforeach ?>
        </table>
        </div>
    </div>
</div>