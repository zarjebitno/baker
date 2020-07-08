<div class="container">
    <div class="row">
        <table class="cart-table" style="margin: 120px">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Num of items</th>
                <th>Price</th>
            </tr>
        <?php
            if(isset($_SESSION['cart'])) {
                //
            }
            else {
                echo "<tr><td>Oops, not yet functional</td></tr>";
            }
        ?>
        </table>
    </div>
</div>