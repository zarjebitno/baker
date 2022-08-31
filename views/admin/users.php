<?php

require_once "models/users/functions.php";


?>

<div class="container">
    <div class="row">
        <h2>Manage users <a href="index.php?page=user-add"><i class="fas fa-plus-circle"></i></a></h2>

        <table id="user-table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <?php 
                $i = 0;
                $users = getUsers();
                foreach($users as $u):
                    $i++;
            ?>

            <tr>
                <td>#<?=$i?></td>
                <td><?=$u->first_name . " " . $u->last_name?></td>
                <td><?=$u->username?></td>
                <td><?=$u->email?></td>
                <td><?if($u->role == 1) echo "Admin"; else echo "User"?></td>
                <td><a href="index.php?page=user-edit&id=<?=$u->id?>"><i class="fas fa-edit" data-id="<?=$u->id?>"></i></a><i class="fas fa-minus-square user-delete" data-id="<?=$u->id?>"></i></td>
            </tr>

            <?php endforeach ?>
        </table>

        <a href="models/data_exports.php?data=excel" class="d-block mt-3">Export</a>
    </div>
</div>