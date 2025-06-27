<?php 
    include_once("top.php");
    include_once("header.php");
    

if (checkSession("username")){
    if (getSession("username") != "minthihatun") {
        header("location:index.php");
    }
}else {
    header("location:admin.php");
}
if (isset($_POST["reset"])){
    header("location:index.php");
}


if (isset($_POST["submit"])){
    $postTitle = $_POST["postTitle"];
    $postType = $_POST["postType"];
    $postWriter = $_POST["postWriter"];
    $postContent = $_POST["postContent"];
    $subject = $_POST["subject"];

    // echo "Post Title is => " . $postTitle ."<br>";
    // echo "Post Type is => " . $postType ."<br>";
    // echo "Post Writer is => " . $postWriter ."<br>";
    // echo "Post Content is => " . $postContent ."<br>";

    $imglink = mt_rand(time(), time()) . "_" . $_FILES["file"]["name"]; 
    move_uploaded_file($_FILES["file"]["tmp_name"], $imglink);

    $bol = insertPost($postTitle, $postType,$subject, $postWriter, $postContent, $imglink);
    
    if ($bol) {
        echo "
        <div class='container mt-3'>
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                Post Image Inserted!
            </div>
        </div>";
    }else {
        echo "
        <div class='container mt-3'>
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                Post Image Failed!
            </div>
        </div>";
    }
    
    // $file = $_FILES["file"];
    // echo "<pre>". print_r($file,true) . "</pre>";

}

?>
 
<div class="container my-5">
    <div class="row">
        <?php include_once("sidebar.php"); ?>  <!-- Sidebar -->
        <section class="col-md-9">
            <h3 class="text-center text-danger">Post Insert Form</h3>
            <form action="admin.php" method="post" enctype="multipart/form-data" class="border border-1 rounded-0 p-4 p-5">
                <div class="form-group mb-3">
                    <label for="postTitle" class="form-label">Post Title</label>
                    <input type="text" class="form-control" id="postTitle" name="postTitle" placeholder="Enter Post Title">
                </div>

                <div class="form-group mb-3">
                    <label for="postType" class="form-label">Post Type</label>
                    <select class="form-control" id="postType" name="postType">
                        <option value="1">Free Post</option>
                        <option value="2">Paid Post</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="subject" class="form-label">Subjects</label>
                    <select class="form-control" id="subject" name="subject">
                        <?php 
                            $subjects = getAllSubject();
                            foreach ($subjects as $subject) {   
                                echo "<option value='".$subject["id"]."'>".$subject["name"]."</option>"; 
                            }
                        ?>
                    </select>
                </div>


                <div class="form-group mb-3">
                    <label for="postWriter" class="form-label">Post Writer</label>
                    <input type="text" class="form-control" id="postWriter" name="postWriter" placeholder="Enter Writer Name">
                </div>

                <div class="form-group mb-3">
                    <label for="file" class="form-label">
                        <input type="file" class="custom-file-input" id="file" name="file" multiple>
                        <span class="custom-file-control"></span>
                    </label>
                </div>

                <div class="form-group mb-4">
                    <label for="postContent" class="form-label">Post Content</label>
                    <textarea type="text" class="form-control" id="postContent" 
                              name="postContent" rows="15" 
                              placeholder="Write your content here..."></textarea>
                </div>

                <div class="d-flex justify-content-end gap-3">
                    <button type="submit" name="reset" class="btn btn-outline-secondary px-4">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-primary px-5">Post</button>
                </div>
            </form>
        </section>
    </div>
</div>

<?php 
    include_once("footer.php"); 
    include_once("base.php");
?>

