<?php 
    include_once("top.php");
    include_once("header.php");

$start = 0;
if (isset($_GET["start"])) {
   $start = $_GET["start"];
}
$rows = getPostCount();

?>



<div class="container my-5">
    <div class="row">
        <?php include_once("sidebar.php"); ?>  <!-- Sidebar -->
        <section class="col-md-9">
      <div class="row">
        <?php 
          if (checkSession("username")) {
            $result = getAllPost(2, $start);
          }else {
            $result = getAllPost(1, $start);
          }

          foreach ($result as $post) {
            $postId = $post["id"];
            echo '
            <div class="col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <h3 class="card-title">'.$post["title"].'</h3>
                  <p class="card-text">'.substr($post["content"],0,100).'</p>
                  <div class="text-end">
                    <a href="postdetails.php?postId='.$post["id"].'" class="btn btn-primary">Details</a>
                  </div>
                </div>
              </div>
            </div>
            ';
          }
        ?>

      </div>
        </section>
    </div>
</div>

<div class="container">
  <div class="col-md-4 offset-md-4">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
           <?php 
            $t = 0 ;
            for ($i = 0; $i < $rows; $i+=10) {
              $t++;
               echo '<li class="page-item"><a class="page-link" href="index.php?start='.$i.'">'.$t.'</a></li>';
            }
           ?>
        </ul>
      </nav>  
  </div>
</div>


<?php 
    include_once("footer.php"); 
    include_once("base.php");
?>

