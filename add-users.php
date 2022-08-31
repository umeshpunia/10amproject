<?php
include_once "includes/head.php";
include_once "includes/navbar.php";

if(isset($_POST['add'])){
    $email=$_POST['email'];
    $password=password_verify($_POST['password'],PASSWORD_BCRYPT);
    $ins_user_sql="insert into users (email,password) values ('$email','$password')";

    if(mysqli_query($conn,$ins_user_sql)){
        alert("User Added");
        redirect("users.php");
    }else{
        $msg="Please Add Again";
    }
}

?>

<div class="container my-5">
    <h1 class="my-5 text-center">Add Users</h1>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form method="post">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <h3 class="text-danger"><?=$msg?></h3>
                <button type="submit" name="add" class="btn btn-success">Add Now</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

<?php
include_once "includes/footer.php";
?>