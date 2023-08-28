<?php

require('connect.php');

session_start();

function executeQuery($query, $data){
    global $conn;

    $sql = $conn->prepare($query);
    $sql->execute($data);
    return $sql;
}

function selectAll($table, $conditions = []) {

    global $conn;
    $query = "SELECT * FROM $table";
    $params = [];

    if(!empty($conditions)){
        $query .= " WHERE ";
        $i = 0;
        foreach($conditions as $key => $value) {
            if($i > 0) {
                $query .= " AND ";
            }
            $query .= "$key=?";
            $params[] = $value;
            $i++;
        }
    }

    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $records;
}
function selectOne($table, $conditions = []) {

    global $conn;
    $query = "SELECT * FROM $table WHERE ";
    $params = [];

    $i = 0;
    foreach($conditions as $key => $value) {
        if($i > 0) {
            $query .= " AND ";
        }
        $query .= "$key=?";
        $params[] = $value;
        $i++;
    }
    $query .= " LIMIT 1";

    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    return $record;
}


function insertOperation($table, $data) {
    global $conn;

    $columns = array_keys($data);
    $placeholders = array_fill(0, count($data), '?');
    $query = "INSERT INTO $table (" . implode(',', $columns) . ") VALUES (" . implode(',', $placeholders) . ")";

    $stmt = $conn->prepare($query);
    $stmt->execute(array_values($data));
    $id = $conn->lastInsertId();

    return $id;
}
function updateOperation($table, $id, $data) {
    global $conn;

    $columns = array_keys($data);
    $placeholders = array_fill(0, count($data), '?');
    $data['id'] = $id;
    $setClause = implode('=?,', $columns) . '=?';
    $query = "UPDATE $table SET $setClause WHERE id=?";

    $stmt = $conn->prepare($query);
    $stmt->execute(array_values($data));
    $affectedRows = $stmt->rowCount();

    return $affectedRows;
}
function deleteOperation($table, $id) {
    global $conn;

    $query = "DELETE FROM $table WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);
    $affectedRows = $stmt->rowCount();

    return $affectedRows;
}
function getPublishedPosts() {
    global $conn;

    $query = "SELECT p.*, u.username 
              FROM posts AS p 
              JOIN users AS u
              ON p.user_id = u.id
              WHERE p.published = ?";

    $stmt = $conn->prepare($query);
    $stmt->execute([1]);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $records;
}

function getPostsbyTopicId($topic_id) {
    global $conn;
    $query = "SELECT p.*, u.username 
              FROM posts AS p 
              JOIN users AS u
              ON p.user_id = u.id
              WHERE p.published = ?
              AND topic_id = ?";

    $sql = executeQuery($query, [1, $topic_id]);

    $records = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

function searchPosts($words) {
    $match = '%' . $words . '%';
    global $conn;
    $query = "SELECT p.*, u.username 
              FROM posts AS p 
              JOIN users AS u
              ON p.user_id = u.id
              WHERE p.published = ? 
              AND (p.title LIKE ? OR p.content LIKE ?)";
    
    $sql = executeQuery($query, [1, $match, $match]);

                                 
    $records = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}
