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
            <div class="tabela">
            <div style="padding: 2rem">
                <a href="create.php" class="btn btn-success" style="color:white;">Add Topic</a>
                <a href="index.php" class="btn btn-success" style="color:white;">Manage Topics</a>
            </div>

       
            <h2 class="page-title">Manage Topics</h2>

           <?php
            include(ROOT_PATH . "/app/includes/messages.php");
           ?>
            
            <table>
                <thead>
                    <th>SN</th>
                    <th>Name</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody>

                <?php foreach($topics as $key => $topic): ?>
                    <tr>
                        <td><?php echo $key +1; ?></td>
                        <td><?php echo $topic['name']; ?></td>
                        <td><a href="edit.php?id=<?php echo $topic['id']; ?>" class="edit">edit</a></td>
                        <td><a href="index.php?del_id=<?php echo $topic['id']; ?>" class="delete">delete</a></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
            </div>
          </div>
        </div>
      </section>



  <?php
     include(ROOT_PATH . "/app/includes/adminFooter.php");
  ?>