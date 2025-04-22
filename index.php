<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Auth Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php if(isset($_SESSION['user_id'])): ?>
            <div class="alert alert-success">You're logged in! <a href="app.php" class="btn btn-primary">Go to App</a></div>
        <?php else: ?>
            <div class="row">
                <div class="col-md-6">
                    <h2>Login</h2>
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                
                <div class="col-md-6">
                    <h2>Register</h2>
                    <form action="register.php" method="POST">
                        <div class="mb-3">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-success">Register</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>