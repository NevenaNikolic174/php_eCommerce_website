<?php
    include('../../path.php');
    include(ROOT_PATH . "/app/controllers/users.php");
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
                <a href="create.php" class="btn btn-success" style="color:white;">Add User</a>
                <a href="index.php" class="btn btn-success" style="color:white;">Manage Users</a>
            </div>

       
            <h2 class="page-title">Edit User</h2>
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                <form action="edit.php" method="post">

                <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                <div class="form-outline mb-4">
                        <input type="text" class="form-control form-control-lg" name="username" 
                        value="<?php echo $username; ?>"/>
                        <label class="form-label" name="username">Name</label>
                      </div>
      
                      <div class="form-outline mb-4">
                        <input type="email" id="form3Example1cg" class="form-control form-control-lg" name="email" 
                        value="<?php echo $email; ?>"/>
                        <label class="form-label" for="form3Example1cg" name="email">Email</label>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" id="form3Example1cg" class="form-control form-control-lg" name="password"
                        value="<?php echo $password; ?>" />
                        <label class="form-label" for="form3Example1cg" name="password">Password</label>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" id="form3Example1cg" class="form-control form-control-lg" name="password_confirmation" 
                        value="<?php echo $passConfim; ?>"/>
                        <label class="form-label" for="form3Example1cg" name="password_confirmation">Password confirmation</label>
                      </div>

                      <div class="form-outline mb-4">
                        <?php if(isset($role) && $role == 1): ?>
                      <label class="form-label" for="form3Example1cg">Admin
                        <input type="checkbox" name="role" checked/>
                      </label>
                      <?php else: ?>
                        <label class="form-label"> Admin 
                          <input type="checkbox" name="role" />
                        </label>
                      <?php endif; ?>
                    </div>
              
                    <div>
                    <button class="btn btn-outline-light btn-lg px-5" id="addTopic" name="update-user" type="submit">Update user</button>
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