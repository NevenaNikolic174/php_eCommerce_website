<?php 
$navigacije = selectAll('navigations');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> WEBIO</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/admin.css" />
  </head>
  <body class="sub_page">
  
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="../../index.php">
            <span>WEBIO</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                  <?php foreach($navigacije as $navigacija): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo $navigacija['href'];?>"><?php echo $navigacija['title'];?></a>
                    </li>
                  <?php endforeach; ?>
                  </ul>
           

            <ul class="navbar-nav">
              <?php if(isset($_SESSION['id'])):
                $username = $_SESSION['username'];
                $role = $_SESSION['role'];
              ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $username;?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php if($role): ?>
                  <a class="dropdown-item" href="http://localhost/webio/admin/dashboard.php">Dashboard</a>
                  <?php endif; ?>
                  <a class="dropdown-item" href="http://localhost/webio/logout.php">Logout</a>
                </div>
              </li>
              <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="../../login.php">
                  <span>Login</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../register.php">
                  <span>SignUp</span>
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </div>
        </nav>
      </div>
    </header>
  