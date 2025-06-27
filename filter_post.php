<?php 
    include_once("top.php");
?>


<div class="container my-5">
    <div class="row">
        <?php include_once("sidebar.php"); ?>  <!-- Sidebar -->
        <section class="col-md-9">
      <div class="row">
        <?php  
            if (isset($_GET["subjectId"])) {
                $subjectId = (int)$_GET["subjectId"];  
                $result = checkSession("username") ? getFilteredPost($subjectId, 2) : getFilteredPost($subjectId, 1);

        //   if (checkSession("username")) {
        //     $result = getFilteredPost($_GET["subjectId"],2);
        //   }else {
        //     $result = getFilteredPost($_GET["subjectId"],1);
        //   }

          foreach ($result as $post) {
            // $postId = $post["id"];
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
        }
            //     foreach ($result as $post) {
            //         echo '
            //         <div class="col-md-6 mb-4">
            //             <div class="card h-100">
            //                 <div class="card-body">
            //                     <h3 class="card-title">'.$post["title"].'</h3>
            //                     <p class="card-text">'.substr($post["content"],0,100).'</p>
            //                     <div class="text-end">
            //                         <a href="postdetails.php?postId='.$post["id"].'" class="btn btn-primary">Details</a>
            //                     </div>
            //                 </div>
            //             </div>
            //         </div>
            //         ';
            //     }

            // }         
            ?>

      </div>
        </section>
    </div>
</div>

<?php 
    include_once("footer.php"); 
    include_once("base.php");
?>