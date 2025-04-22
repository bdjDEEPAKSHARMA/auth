<?php
include 'config.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];
    
    $stmt = $pdo->prepare("INSERT INTO comments (user_id, comment) VALUES (?, ?)");
    $stmt->execute([$user_id, $comment]);
    
    header("Location: app.php");
    exit();
}