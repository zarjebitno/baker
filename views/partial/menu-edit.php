<?php
    require_once "models/menu/get-one.php";
?>

<div class="container menu-add-cont">
    <form action="models/menu/menu-edit.php" method="post" class="menu-add-form">
        <input type="text" name="menuName" class="form-control" placeholder="Name" required value="<?=$menu->name?>"/>
        <input type="text" name="href" class="form-control" placeholder="href" required value="<?=$menu->src?>"/>
        <button type="submit" name="menu-edit" class="form-control" style="margin-top:15px; width: 50%;" value="<?=$m->id?>">Edit</button>
    </form>
</div>