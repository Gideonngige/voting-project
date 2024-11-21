<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="login.css">
    <title>login</title>
</head>
<body>
    <div class="container">
        <div class="inner-container">
            <h2>Login</h2><hr>
            <form action="login.php" method="POST">
                <label for="username">Registration Number</label><br>
                <input type="text" id="username" name="regno" class="form-control" required><br>
                <label for="password">ID Number</label><br>
                <input type="password" id="idnumber" class="form-control" name="idnumber" required><br>
                <a href="#">Forgot your password?</a>
                <input type="submit" class="form-control" value="Login">
            </form>
            </div>

    </div>
    
</body>
</html>