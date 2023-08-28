<?php
    include('../path.php');
    include(ROOT_PATH . "/app/controllers/posts.php");
    adminOnly(); 
    include(ROOT_PATH . "/app/includes/dashboardHeader.php");
    include(ROOT_PATH . "/app/includes/dashboardSidebar.php");
?>
 
<section class="vh-100 gradient-custom" >
        <div class="py-5">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="tabelaCreate">
           

       
            <h2 class="page-title">Dashboard</h2>

            <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>


             
                <div id="rezultat"></div>
                </div>
              </div>
            </div>
          </div>
        
      </section>



  <?php
     include(ROOT_PATH . "/app/includes/footer.php");
  ?>