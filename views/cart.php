<?php
    require_once 'models/cart/functions.php';
    $cartItems = getCartItems($_SESSION['user']->id);

    foreach($cartItems as $key => $item) {
        $groupedUpCartItems[$item->id][] = $item;
    }
?>

<div class="container">
    <div class="row">
        <table class="cart-table" style="margin: 120px 0">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Num of items</th>
                <th>Price</th>
                <th style="text-align: right;">Actions</th>
            </tr>
        <?php
            $mark = 1;
            if(!empty($cartItems)) {
                foreach($groupedUpCartItems as $key => $cartItem):?>
                    <tr>
                        <th><?=$mark++?></th>
                        <th><?=$cartItem[0]->name?></th>
                        <th><?=count($cartItem)?></th>
                        <th><?=$cartItem[0]->price * count($cartItem)?>&euro;</th>
                        <th style="text-align: right;"><i class="fas fa-minus-square cart-delete p-4" data-id="<?=$cartItem[0]->product_id?>"></i></th>
                    </tr>
                <?php endforeach;
            }
            else {
                echo "<tr><td colspan='5'>Your cart is empty.</td></tr>";
            }
        ?>
        </table>

        <a href="models/cart/purchase.php" class="btn btn-danger">Purchase</a>
    </div>
</div>