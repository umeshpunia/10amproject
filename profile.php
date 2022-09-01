<?php
include_once "includes/head.php";
include_once "includes/navbar.php";

if(isset($_POST['pass'])){
    $op=$_POST['op'];
    $np=$_POST['np'];
    $cp=$_POST['cp'];

    if($op==$np){
        $msg="Please Dont Use Old Password Inside New Password";
    }else if($np!==$cp){
        $msg="Please Match Password";
    }else{
        // match dbpass with op

        if(password_verify($op,$login_user_info['password'])){
            $password=password_hash($np,PASSWORD_BCRYPT);
            // update password to db
            $upd_pass_sql="update users set password='$password' where email='$login_user_email'";

            if(mysqli_query($conn,$upd_pass_sql)){
                alert("Password Changed");
                redirect("logout.php");
            }else{
                $msg="Please Try Again";
            }


        }else{
            $msg="Please Enter Correct Password";
        }

    }
}

?>

<div class="container my-5">
    <h1 class="text-center my-5">My Profile</h1>
    <div class="row">
        <div class="col-sm-6">
            <h2>Information</h2>
        </div>
        <div class="col-sm-6">
            <h2>Password</h2>
            <form method="post">
                <div class="form-group">
                    <label for="">Old Password</label>
                    <input type="text" name="op" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">New Password</label>
                    <input type="text" name="np" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="text" name="cp" class="form-control">
                </div>
                <h3 class="text-danger"><?=$msg?></h3>
                <button type="submit" class="btn btn-info" name="pass">Update Password</button>
            </form>
        </div>
    </div>
</div>

<?php
include_once "includes/footer.php";
?>