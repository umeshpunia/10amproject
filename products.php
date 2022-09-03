<?php
include_once "includes/head.php";
include_once "includes/navbar.php";
$get_pro_sql = "select * from products";

$get_pro_query = mysqli_query($conn, $get_pro_sql);


?>
<div class="container my-5">
    <h1 class="text-center my-5">Products</h1>
    <a href="add-pro.php" class="btn btn-info my-5">Add Product</a>
    <table class="table" id="dt">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Picture</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            while ($get_pro = mysqli_fetch_assoc($get_pro_query)) {
            ?>
                <tr>
                    <th scope="row"><?=$i++?></th>
                    <td><?=ucwords($get_pro['pro_title'])?></td>
                    <td><?=substr($get_pro['pro_description'],0,20)?>...</td>
                    <td>
                        <img src="assets/images/products/<?=$get_pro['pro_pic']?>" height="80" alt="">
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