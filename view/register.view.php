<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="/api/Fusion/System/register.inc.php" method="POST">
        <input type="text" name="name" placeholder="Full Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="passwordRepeat" placeholder="Repeat Password" required><br>
        <button type="submit" name="submit">Register</button>
    </form>
    <p>Already have an account? <a href="/login">Login here</a></p>
</body>
</html>
