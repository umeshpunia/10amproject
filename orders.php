<?php
include_once "includes/head.php";
include_once "includes/navbar.php";
$get_order_sql = "select * from orders";

$get_order_query = mysqli_query($conn, $get_order_sql);


?>
<div class="container my-5">
    <h1 class="text-center my-5">Orders</h1>
    <table class="table" id="dt">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Title</th>
                <th scope="col">Quantity * Price</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            while ($get_order = mysqli_fetch_assoc($get_order_query)) {
            ?>
                <tr>
                    <th scope="row"><?=$i++?></th>
                    <td><?=ucwords($get_order['pro_title'])?></td>
                    <td><?=$get_order['o_quantity']."*".$get_order['price']?></td>
                    <td>
                        <a href="" class="btn btn-warning"><?=$get_order['order_status']?></a>
                    </td>
                </tr>

            <?php
            }
            ?>


        </tbody>
    </table>
</div>
<?php
include_once "includes/footer.php";
?>