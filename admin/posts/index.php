<?php
    include('../../path.php');
    include(ROOT_PATH . "/app/controllers/posts.php");
    adminOnly(); 
    include(ROOT_PATH . "/app/includes/adminHeader.php");
    include(ROOT_PATH . "/app/includes/adminSidebar.php");


 
    
?>
<section class="vh-100 gradient-custom">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
              <a href="create.php" class="btn btn-success">Add Post</a>
              <a href="index.php" class="btn btn-success">Manage Posts</a>
            </div>
            <h2 class="card-title mb-4">Manage Posts</h2>
            <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col" colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($posts as $key => $post) : ?>
                    <tr>
                      <td><?php echo $key + 1; ?></td>
                      <td><?php echo $post['title']; ?></td>
                      <td><?php echo $username; ?></td>
                      <td>
                        <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                      </td>
                      <td>
                        <a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                      </td>
                      <?php if ($post['published']) : ?>
                        <td>
                          <a href="edit.php?published=0&p_id=<?php echo $post['id'] ?>" class="btn btn-sm btn-success">Publish</a>
                        </td>
                      <?php else : ?>
                        <td>
                          <a href="edit.php?published=1&p_id=<?php echo $post['id'] ?>" class="btn btn-sm btn-warning">Unpublish</a>
                        </td>
                      <?php endif; ?>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




  <?php
    include(ROOT_PATH . "/app/includes/adminFooter.php");
  ?>