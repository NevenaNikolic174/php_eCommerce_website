<?php
    include('../../path.php');
    include(ROOT_PATH . "/app/controllers/topics.php");
    adminOnly(); 
    include(ROOT_PATH . "/app/includes/adminHeader.php");
    include(ROOT_PATH . "/app/includes/adminSidebar.php");
    
?>


     
<section class="vh-100 gradient-custom" >
        <div class="py-5">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="tabelaCreate">
            <div style="padding: 2rem">
                <a href="create.php" class="btn btn-success" style="color:white;">Add Topic</a>
                <a href="index.php" class="btn btn-success" style="color:white;">Manage Topics</a>
            </div>

       
            <h2 class="page-title">Add Topic</h2>
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                <form action="create.php" method="post">
                    <div class="form-outline mb-4">
                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" 
                          value="<?php echo $name?>"/>
                        <label class="form-label" for="form3Example1cg" name="name">Name</label>
                      </div>
      
                    <div class="form-outline form-white mb-4">
                        
                    <textarea name="description" id="body"><?php echo $description?></textarea>
                    <label class="form-label" id="labelDesc" for="desciption">Description</label>
                     
                    </div>
                    <button class="btn btn-outline-light btn-lg px-5" id="addTopic" type="submit" name="add-topic">Add topic</button>
                  </div>
            
                </form>
         <div id="rezultat"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



  <?php
     include(ROOT_PATH . "/app/includes/adminFooter.php");
  ?>