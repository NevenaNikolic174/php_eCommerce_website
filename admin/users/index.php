<?php
    include('../../path.php');
    
    include(ROOT_PATH . "/app/controllers/users.php");
    adminOnly(); 
    
    include(ROOT_PATH . "/app/includes/adminHeader.php");
    
    include(ROOT_PATH . "/app/includes/adminSidebar.php");
    $limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Get total number of users
$sql = "SELECT COUNT(*) AS total FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch();
$total = $result['total'];

// Calculate total pages
$totalPages = ceil($total / $limit);

// Fetch users for current page
$sql = "SELECT * FROM users LIMIT :offset, :limit";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();
$admin_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="vh-100 gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card"  style="width: 500px;">
          <div class="card-body" >
            <a href="create.php" class="btn btn-success mb-3">Add User</a>
            <a href="index.php" class="btn btn-success mb-3">Manage Users</a>

            <h2 class="card-title">Manage Users</h2>

            <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($admin_users as $key => $user): ?>
                <tr>
                  <td><?php echo $offset + $key + 1; ?></td>
                  <td><?php echo $user['username']; ?></td>
                  <td><?php echo $user['email']; ?></td>
                  <td>
                    <a href="edit.php?id=<?php echo $user['id'];?>" class="btn btn-primary btn-sm mr-2">Edit</a>
                    <a href="index.php?delete_id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

            <?php if($totalPages > 1): ?>
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center mt-3">
                <?php if($page > 1): ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a></li>
                <?php endif; ?>

                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                <?php if($i == $page): ?>
                <li class="page-item active"><a class="page-link" href="#"><?php echo $i; ?></a></li>
                <?php else: ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endif; ?>
                <?php endfor; ?>

                <?php if($page < $totalPages): ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a></li>
                <?php endif; ?>
              </ul>
            </nav>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



  <?php
     include(ROOT_PATH . "/app/includes/adminFooter.php");
  ?>