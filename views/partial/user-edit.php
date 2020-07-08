<?php
    require_once "models/users/get-one.php";
?>

<section class="edit-user">
    <form action="models/users/edit-user.php" method="POST" onsubmit="return registerVal();" class="edit-user">
        <input type="text" name="first-name" placeholder="First Name" required class="form-control" value="<?=$user->first_name?>"/>
        <input type="text" name="last-name" placeholder="Last Name" required class="form-control" value="<?=$user->last_name?>"/>
        <input type="text" name="username" placeholder="Username" required class="form-control" value="<?=$user->username?>"/>
        <input type="email" name="email" placeholder="Email" required class="form-control" value="<?=$user->email?>"/>
        <input type="password" name="pw" placeholder="New Password" required class="form-control"/>
        <select name="role-id" class="form-control">
            <option value="1">Admin</option>
            <option value="2" selected>User</option>
        </select>
        <button type="submit" name="update-user" class="modal-btn form-control" value="<?=$user->id?>">Update</button>
    </form>
</section>