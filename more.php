<?php
include('path.php');
include(ROOT_PATH . "/app/controllers/posts.php");

include(ROOT_PATH . "/app/includes/messages.php");
include(ROOT_PATH . "/app/includes/header.php");
if(!isset($_GET['id'])) {
  $_SESSION['message'] = "You have not selected any post. We return you to the home page.";
  $_SESSION['type'] = "alert alert-warning";
  header('location: http://localhost/webio/index.php');
  exit();
}

$post = selectOne('posts', ['id' => $_GET['id']]);

$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);
 
?>

<section class="make_section layout_padding">
  <div class="container" style="margin: 5% auto;">
    <div class="d-flex justify-content-center">
      <h2>
        <?php echo $post['title'];?>
      </h2>
    </div>

    <div class="col m3" style="display: inline-block;margin: 5rem auto;">
      <div style="display: inline-block; vertical-align: top; margin-right: 5rem; border-radius: 4px; padding: 2rem;">
        <img src="<?php echo 'http://localhost/webio/assets/images/' . $post['image']; ?>" alt="" width="800"/></br>
      </div>
      <div style="display: inline-block; vertical-align: top; margin-left: 10px; color:#1b2e31;font-weight: bold;">
        <p>
          <?php echo ($post['content']);?>
        </p>
      </div>
      <div style="margin: 25% 0 0 3%;">
        <h2>Topics</h2>
        <ul>
          <?php foreach($topics as $topic): ?>

            <li style="display: inline-block; padding: 5rem 0 0 2rem;">
                <a href="<?php echo 'http://localhost/webio/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>" style="font-weight: bolder;">
                    <?php echo $topic['name'];?>
                </a>
            </li>

          <?php endforeach; ?>
      </ul>
      </div>
    </div>
  </div>
</section>
  <!-- end online section -->

  <section>
  <div class="container">
    <div class="d-flex justify-content-center">
      <h2 style="padding: 2rem;">Trending Posts</h2>
    </div>
    <div class="row">
      <?php foreach($posts as $post): ?>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="<?php echo 'http://localhost/webio/assets/images/' . $post['image']; ?>" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title"><a href="more.php?id=<?php echo $post['id']?>"><?php echo $post['title']; ?></a></h5>
              <p class="card-text"><i class="fa fa-calendar me-2"></i><?php echo date('F j. Y.', strtotime($post['created_at'])); ?></p>
            </div>
          </div>
          
        </div>
      <?php endforeach; ?>
    </div>
  </div> 
</section>

  <?php
    include(ROOT_PATH . "/app/includes/footer.php");
  ?>