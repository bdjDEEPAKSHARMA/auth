<?php 
include 'config.php';
if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Get user data
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-4">
            <h1>Welcome User!</h1>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>

        <!-- Save Content Form -->
        <div class="card mb-4">
            <div class="card-body">
                <h3>Save Content</h3>
                <form action="save.php" method="POST">
                    <textarea name="content" class="form-control mb-3" required></textarea>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>

        <!-- Saved Items -->
        <div class="card mb-4">
            <div class="card-body">
                <h3>Saved Items</h3>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM saved_items WHERE user_id = ?");
                $stmt->execute([$user_id]);
                $items = $stmt->fetchAll();
                
                foreach($items as $item): ?>
                    <div class="card mb-2">
                        <div class="card-body">
                            <?= htmlspecialchars($item['content']) ?>
                            <small class="text-muted"><?= $item['saved_at'] ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="card">
            <div class="card-body">
                <h3>Comments</h3>
                <form action="comment.php" method="POST">
                    <textarea name="comment" class="form-control mb-3" required></textarea>
                    <button type="submit" class="btn btn-success">Post Comment</button>
                </form>

                <div class="mt-4">
                    <?php
                    $stmt = $pdo->prepare("SELECT comments.*, users.username FROM comments 
                                         JOIN users ON comments.user_id = users.id 
                                         ORDER BY created_at DESC");
                    $stmt->execute();
                    $comments = $stmt->fetchAll();
                    
                    foreach($comments as $comment): ?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <strong><?= htmlspecialchars($comment['username']) ?></strong>
                                <p><?= htmlspecialchars($comment['comment']) ?></p>
                                <small class="text-muted"><?= $comment['created_at'] ?></small>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>