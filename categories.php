<?php
include_once "includes/head.php";
include_once "includes/navbar.php";
$get_cat_sql = "select * from categories";

$get_cat_query = mysqli_query($conn, $get_cat_sql);


?>
<div class="container my-5">
    <h1 class="text-center my-5">Categories</h1>
    <a href="add-cat.php" class="btn btn-info my-5">Add Category</a>
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
            while ($get_cat = mysqli_fetch_assoc($get_cat_query)) {
            ?>
                <tr>
                    <th scope="row"><?=$i++?></th>
                    <td><?=ucwords($get_cat['cat_title'])?></td>
                    <td><?=substr($get_cat['cat_description'],0,20)?>...</td>
                    <td>
                        <img src="assets/images/categories/<?=$get_cat['cat_pic']?>" height="80" alt="">
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