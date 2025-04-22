<?php
include 'config.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];
    
    $stmt = $pdo->prepare("INSERT INTO saved_items (user_id, content) VALUES (?, ?)");
    $stmt->execute([$user_id, $content]);
    
    header("Location: app.php");
    exit();
}