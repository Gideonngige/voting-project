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
                <label for="password">ID Number</label><br>
                <input type="password" id="idnumber" class="form-control" name="idnumber" required><br>
                <label for="username">Registration Number</label><br>
                <input type="text" id="username" name="regno" class="form-control" required><br>
                <a href="#">Forgot your password?</a>
                <input type="submit" class="form-control" value="Login">
            </form>
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "@mysql2024";
            $dbname = "election";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
             if(!$conn){
                die("Connection failed!" . mysqli_connect_error());
             }
             else{
               echo "Connected";
             }
             if(isset($_POST["regno"]) && isset($_POST["idnumber"])){
                $regno = $_POST["regno"];
                $idnumber = $_POST["idnumber"];
                $sql = "SELECT first_name, last_name, id_number, reg_number FROM Voters WHERE reg_number='$regno' AND id_number='$idnumber'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        session_start();
                        $_SESSION["username"] = $row["first_name"] . " " . $row["last_name"];
                        header("Location: home.php");
                    }
                    echo '<div class="alert alert-success" role="alert">'; echo "Login Succesful"; echo '</div>';
                } else{
                    echo '<div class="alert alert-danger" role="alert">'; echo "Invalid registration number or ID number"; echo '</div>';
                }
             }else{
                echo '<div class="alert alert-danger" role="alert">'; echo "Provide all inputs to login"; echo '</div>'; 
             }
            ?>
            </div>

    </div>
    
</body>
</html>