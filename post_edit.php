<?php 
    include_once("top.php");
    include_once("header.php");

$posts = [
    "title" => "",
    "writer" => "",
    "imglink" => "",
    "content" => ""
];

if (isset($_POST["reset"])) {
    header("location:show_all_post.php");
}


if (isset($_GET["postId"])) {
    $postId = $_GET["postId"];
    $result = getSinglePost($postId);
    $posts = [];
    foreach ($result as $item) {
        $posts["title"] = $item["title"];
        $posts["writer"] = $item["writer"];
        $posts["imglink"] = $item["imglink"];
        $posts["content"] = $item["content"];
    }
}

if (isset($_POST["submit"])) {
    $file = $_FILES["file"];
    $imgname = "";
    if ($_FILES["file"]["name"] != NULL){
        $imgname = mt_rand(time(), time()) . "_" . $_FILES["file"]["name"]; 
        move_uploaded_file($_FILES["file"]["tmp_name"], $imgname);
    }else {
        $imgname = $_POST["oldimg"];
    }
    $postTitle = $_POST["postTitle"];
    $postType = $_POST["postType"];
    $subject = $_POST["subject"];
    $postWriter = $_POST["postWriter"];
    $postContent = $_POST["postContent"];
    $imglink = $imgname;
    

    // $postId = $_POST["postId"];
    // echo $postId;

    updatePost($postTitle, $postType, $subject, $postWriter, $postContent,$imglink, $postId); 
}

?>
 
<div class="container my-5">
    <div class="row">
        <?php include_once("sidebar.php"); ?>  <!-- Sidebar -->
        <section class="col-md-9">
            <h3 class="text-center text-danger">Post Edit Here</h3>
                <?php $postId = $_GET['postId'] ?? 0; ?>
                <form action="post_edit.php?postId=<?php echo $_GET['postId']; ?>" 
                    method="post" enctype="multipart/form-data" class="border border-1 rounded-0 p-4 p-5">
                <div class="form-group mb-3">
                    <label for="postTitle" class="form-label">Post Title</label>
                    <input type="text" class="form-control" id="postTitle" name="postTitle" value="<?php echo $posts["title"]; ?>" placeholder="Enter Post Title">
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
                    <input type="text" class="form-control" id="postWriter" name="postWriter" value="<?php echo $posts["writer"]; ?>" placeholder="Enter Writer Name">
                </div>

                <div class="form-group mb-3">
                    <label for="file" class="form-label">
                        <input type="file" class="custom-file-input" id="file" name="file" multiple>
                        <span class="custom-file-control"></span>
                        <input type="hidden" name="oldimg" value="<?php echo $posts["imglink"]; ?>">
                    </label>
                </div>

                <div class="form-group mb-4">
                    <label for="postContent" class="form-label">Post Content</label>
                    <textarea type="text" class="form-control" id="postContent" 
                              name="postContent" rows="15" 
                              placeholder="Write your content here...">
                            <?php echo $posts["content"]; ?>
                            </textarea>
                </div>

                <!-- <input type="hidden" name="postId" value="<?php echo $postId; ?>"> -->

                <div class="d-flex justify-content-end gap-3">
                    <button type="submit" name="reset" class="btn btn-outline-secondary px-4">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-primary px-5">Update</button>
                </div>
                <img src="/Simple_Blog/<?php echo $posts["imglink"]; ?>" alt="" class="img-fluid my-3">
            </form>
        </section>
    </div>
</div>

<?php 
    include_once("footer.php"); 
    include_once("base.php");
?>