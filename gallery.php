<?php
    include('path.php');
    include(ROOT_PATH . "/app/database/db.php");
    include(ROOT_PATH . "/app/includes/header.php");

    
    $images = selectAll('galerija');
  ?>

<h2 style="text-align: center; padding: 2rem;">Websites gallery</h2>
<div class="row row-cols-1 row-cols-md-3 g-4" style="margin: 10px 20px;">
  <?php foreach($images as $img): ?>
    <div class="col">
      <div class="card" style="border: none;">
        <img class="images" src="<?php echo 'http://localhost/webio/assets/images/' . $img['putanja']; ?>" alt="<?php echo $img['alt']?>">
      </div>
    </div>
  <?php endforeach; ?>
</div>
  <!-- info section -->
 

  <?php
    include(ROOT_PATH . "/app/includes/footer.php");
  ?>
 