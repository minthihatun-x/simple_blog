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

    $bol = insertPost($postTitle, $postType, $subject, $postWriter, $postContent, $imglink);
    
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
                <?php 
                    $start = 0;
                    $result = getAllPost(2,$start);
                    foreach ($result as $post){
                        echo '<div class="card mb-3 p-3">
                            <div class="card-block">
                            <h5>'.$post["title"].'</h5>
                            <p>'.substr($post["content"],0,100).'</p>
                                <div class="text-end">
                                    <a href="post_edit.php?postId='.$post["id"].'" class="btn btn-primary">Edit</a>
                                </div>                        
                            </div></div>';
                    }
                ?>
            </section>
            
    </div>
</div>

<?php 
    include_once("footer.php"); 
    include_once("base.php");
?>

