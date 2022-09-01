<?php
include_once "includes/head.php";
include_once "includes/navbar.php";

$imsg_path="assets/images/categories";

if(isset($_POST['add'])){

    


    $title=$_POST['title'];
    $description=$_POST['description'];

    $file_name=$_FILES['pic']['name'];
    $file_tmp_name=$_FILES['pic']['tmp_name'];


    // check image or not

    $file_arr=explode(".",$file_name);

    $ext=end($file_arr);

    if($ext=="png" || $ext=="jpg"){

        // create unique name
        $un_name=sha1(time().rand().rand()).".$ext";

        // upload file

        if(move_uploaded_file($file_tmp_name,"$imsg_path/$un_name")){
            // insert db
            $ins_cat_sql="INSERT INTO `categories` (`cid`, `cat_title`, `cat_description`, `add_by`, `add_on`, `cat_pic`) VALUES (NULL, '$title', '$description', '$login_user_email', current_timestamp(), '$un_name')";

            if(mysqli_query($conn,$ins_cat_sql)){
                alert("Category Added");
                redirect("categories.php");
            }else{
                $msg="Please Add Again";
                // unlink delete file from server
                unlink($imsg_path."/$un_name");
            }


        }else{
            $msg="File Not Uploaded Please Try Again";
        }


    }else{
        $msg="Please Choose Valid Image";
    }
    
    
   
}

?>

<div class="container my-5">
    <h1 class="my-5 text-center">Add Category</h1>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Picture</label>
                    <input type="file" name="pic" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"></textarea>
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