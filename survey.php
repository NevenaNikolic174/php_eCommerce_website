<?php
    include('path.php');
    include(ROOT_PATH . "/app/controllers/survey.php");
    include(ROOT_PATH . "/app/includes/header.php");

  ?>
    <div style="margin: 0 40%; background-color: #7fffd43d; padding: 2rem;">
        <form method="post" action="survey.php">
            <h2>Give us your feedback.</h2>
            <?php foreach($answers as $answer): ?>
                <div>
                    <input type="radio" name="answer" value="<?php echo $answer['answer']; ?>">
                    <label for="<?php echo $answer['id']; ?>"><?php echo $answer['answer']; ?></label>
                </div>
            <?php endforeach; ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        </form>
    </div>




<?php
    include(ROOT_PATH . "/app/includes/footer.php");
  ?>