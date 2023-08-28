<?php
    include('../../path.php');
    include(ROOT_PATH . "/app/controllers/posts.php");
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
                <a href="create.php" class="btn btn-success" style="color:white;">Add Post</a>
                <a href="index.php" class="btn btn-success" style="color:white;">Manage Posts</a>
            </div>

       
            <h2 class="page-title">Edit Post</h2>

            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>


                <form action="edit.php" method="post" enctype="multipart/form-data">

                <input type="hidden" id="form3Example1cg" class="form-control form-control-lg" name="id" 
                        value="<?php echo $id ?>"/>


                <div class="form-outline mb-4">
                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="title" 
                        value="<?php echo $title; ?>"/>
                        <label class="form-label" for="form3Example1cg">Title</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <textarea name="content" id="body"><?php echo $content; ?></textarea>
                        <label class="form-label" id="labelDesc" for="desciption">Content</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="file" id="form3Example1cg" class="form-control form-control-lg" name="image" />
                        <label class="form-label" for="form3Example1cg">Image</label>
                    </div>
                    
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1cg" name="role">Topic</label>
                        <select name="topic_id" class="ddlRole">
                            <option value=""></option>

                            <?php foreach($topics as $key => $topic): ?>

                                <?php if(!empty($topic_id) && $topic_id == $topic['id']): ?>

                                    <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>

                                <?php else: ?>

                                    <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>

                                <?php endif; ?>

                            <?php endforeach; ?>

                       </select>
                       <div>

                        <?php if(empty($published) && $published == 0): ?>

                            <label class="form-check-label" for="flexCheckIndeterminate">
                            <input class="form-check-input" type="checkbox" name="published" id="flexCheckIndeterminate">
                            Publish</label>
                        
                        <?php else: ?>

                            <label class="form-check-label" for="flexCheckIndeterminate">
                            <input class="form-check-input" type="checkbox" name="published" id="flexCheckIndeterminate"
                             checked />
                             Publish</label>
                        <?php endif; ?>

                       </div>
                 
                <div>
                    <button class="btn btn-outline-light btn-lg px-5" id="addTopic" name="update-post" type="submit">Update post</button>
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