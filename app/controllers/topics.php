<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/usersType.php");
include(ROOT_PATH . "/app/helpers/validateTopics.php");

$id = '';
$name = '';
$description = '';

$table = 'topics';
$topics = selectAll($table);
$errors = array();



if(isset($_POST['add-topic'])) {

    adminOnly();
    $errors = validateTopic($_POST);
    if(count($errors) ===0){

        unset($_POST['add-topic']);
        
        $topic_id = insertOperation('topics', $_POST);
        $_SESSION['message'] = 'Topic created successfully.';
        $_SESSION['type'] = 'alert alert-success';
        header('location: http://localhost/webio/admin/topics/index.php');
        exit();
    } else {
      
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $topic = selectOne($table, ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}


if(isset($_POST['update-topic'])) {
    adminOnly();
    $errors = validateTopic($_POST);
    if(count($errors) ===0){
        $id= $_POST['id'];
        unset($_POST['id'], $_POST['update-topic']);
        $topic_id = updateOperation($table, $id, $_POST);
        $_SESSION['message'] = 'Topic updated successfully.';
        $_SESSION['type'] = 'alert alert-success';
        header('location: http://localhost/webio/admin/topics/index.php');
        exit();
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}
if(isset($_GET['del_id'])){
    adminOnly();
    $id = $_GET['del_id'];
    $count = deleteOperation($table, $id);
    $_SESSION['message'] = 'Topic deleted successfully.';
    $_SESSION['type'] = 'alert alert-success';
    header('location: http://localhost/webio/admin/topics/index.php');
    exit();
}

?>