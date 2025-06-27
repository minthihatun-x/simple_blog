<?php 
    include_once("top.php");
    include_once("header.php");

if (isset($_GET["postId"])) {
   $postId = $_GET["postId"];
}
?>



<div class="container my-5">
    <div class="card col-md-8 offset-md-2">
        <?php 
            $result = getSinglePost($postId);
            foreach ($result as $data){
                echo '<div class="card-header d-flex justify-content-between align-items-center">'. $data["title"] .'<span> '.$data["created_at"].' </span></div>';
                echo '<img src="/Simple_Blog/' . $data["imglink"] . '" alt="Post Image" class="img-fluid my-3">';
                echo '<div class="card-body">'. $data["content"] .'</div>';
                echo '<div class="card-footer">'. $data["writer"] .'</div>';
            }
        ?>
    </div>
</div>




<?php 
    include_once("footer.php"); 
    include_once("base.php");
?>

