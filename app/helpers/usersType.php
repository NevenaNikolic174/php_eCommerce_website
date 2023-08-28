<?php

function adminOnly($redirect = '/index.php') {

    if(empty($_SESSION['id']) || $_SESSION['role'] != 1) {
        $_SESSION['message'] = 'You are not authorized.';
        $_SESSION['type'] = 'alert alert-danger';
        header('location:' . 'http://localhost/webio' . $redirect);
        exit(0);
    }
}

function guestsOnly($redirect = '/index.php') {

    if(isset($_SESSION['id'])) {
        header('location:' . 'http://localhost/webio' . $redirect);
        exit(0);
    }
}

function redirectTo($path) {
    header('location:' . 'http://localhost/webio' . $path);
    exit(0);
}

?>
