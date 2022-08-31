<?php
include_once "includes/head.php";
include_once "includes/navbar.php";
$get_users_sql = "select * from users";

$get_users_query = mysqli_query($conn, $get_users_sql);


?>
<div class="container my-5">
    <h1 class="text-center my-5">Users</h1>
    <a href="add-users.php" class="btn btn-info my-5">Add Users</a>
    <table class="table" id="dt">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Add On</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            while ($get_users = mysqli_fetch_assoc($get_users_query)) {
            ?>
                <tr>
                    <th scope="row"><?=$i++?></th>
                    <td><?=$get_users['email']?></td>
                    <td><?=$get_users['add_on']?></td>
                    <td>@mdo</td>
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