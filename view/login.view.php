<?php 

session_start();
if (isset($_SESSION["user"])) {
    header("Location: /chat/@me");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/res/style.css">
</head>
<body>
    <div class="view">
        <div id="Fusion-UserForm">
            <h2>Welcome back!</h2>
            <p>Please enter your credentials to login.</p>
            <form action="/api/Fusion/System/login.inc.php" method="POST">
                <input type="email" name="email" placeholder="Email" <?php if(isset($_GET['email'])) { ?> value="<?php echo $_GET['email'] ?>" <?php } ?>required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit" name="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="/register">Register here</a></p>
        </div>
    </div>
    
</body>
</html>
