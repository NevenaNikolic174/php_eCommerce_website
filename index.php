<?php
include('path.php');
include(ROOT_PATH . "/app/controllers/posts.php");

include(ROOT_PATH . "/app/includes/header.php");
include(ROOT_PATH . "/app/includes/messages.php");

$posts = array();
$postsTitle = 'Recent Posts';

if(isset($_GET['t_id'])){
  $posts = getPostsbyTopicId($_GET['t_id']);
  $postsTitle = "You searched for posts under '" . $_GET['name'] . '"';

} else if (isset($_POST['search'])) {
  $postsTitle = "You searched for '" . $_POST['search'] . '"';

  $posts = searchPosts($_POST['search']);

} else {
  $posts = getPublishedPosts();
}

?>

<section style="margin: 5rem auto;">
  <div class="container">
    <div class="d-flex justify-content-center">
      <h2 style="padding: 2rem;">Trending Posts</h2>
    </div>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php $i = 0; foreach($posts as $post): ?>
          <?php if($i % 3 == 0): ?>
            <div class="carousel-item<?php if($i == 0) echo ' active'; ?>">
              <div class="row">
          <?php endif; ?>
                  <div class="col-md-4 mb-4">
                    <div class="card">
                      <img src="<?php echo 'http://localhost/webio/assets/images/' . $post['image']; ?>" class="card-img-top card-img-top-fixed" alt="">
                      <div class="card-body">
                        <h5 class="card-title"><a href="more.php?id=<?php echo $post['id']?>"><?php echo $post['title']; ?></a></h5>
                        <p class="card-text"><i class="fa fa-user me-2"></i><?php echo $post['username']; ?></p>
                        <p class="card-text"><i class="fa fa-calendar me-2"></i><?php echo date('F j. Y.', strtotime($post['created_at'])); ?></p>
                      </div>
                    </div>
                  </div>
          <?php if($i % 3 == 2 || $i == count($posts)-1): ?>
              </div>
            </div>
          <?php endif; ?>
          <?php $i++; ?>
        <?php endforeach; ?>
      </div>
      <button class="prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div> 
</section>


<section>
  <div class="container" style="margin: 5rem auto;">
    <div class="row">
      <div class="col-md-9">
        <div class="d-flex justify-content-center">
          <h2 style="padding-bottom: 5rem"><?php echo $postsTitle?></h2>
        </div>
        <?php if (empty($posts)): ?>
          <p>No posts yet.</p>
        <?php else: ?>
          <div class="row">
            <?php foreach($posts as $post): ?>
              <div class="col-md-4" style="margin-bottom: 2rem;">
                <div class="card">
                  <img src="<?php echo 'http://localhost/webio/assets/images/' . $post['image']; ?>" class="card-img-top" alt="">
                  <div class="card-body">
                    <h5 class="card-title">
                      <a href="more.php?id=<?php echo $post['id']?>"><?php echo $post['title']; ?></a>
                    </h5>
                    <p class="card-text">
                      <?php echo substr($post['content'],0,150) . '...' ;?>
                    </p>
                    <div class="card-footer">
                      <i class="fa fa-user" style="margin-right: 4px;"> by: <?php echo $post['username']; ?> </i>
                      <i class="fa fa-calendar"><?php echo date('F j. Y.', strtotime($post['created_at'])); ?> </i>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="col-md-3">
        <div class="search" style="position: relative; top: 20px;">
          <form action="index.php" method="post">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search title">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
          <div id="topics">
            <h2>Topics</h2>
            <ul>
              <?php foreach($topics as $topic): ?>
                <li class="topics">
                  <a class="topics-links" href="<?php echo 'http://localhost/webio/index.php?t_id=' . $topic['id'].'&name=' . $topic['name']; ?>">
                    <?php echo $topic['name'];?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <?php
    include(ROOT_PATH . "/app/includes/footer.php");
  ?>