
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
                <input type="submit" class="form-control" value="Login"><br>
            </form>
            <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#myModal">Forgot registration number?</button><br><br>
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "@mysql2024";
            $dbname = "election";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
             if(!$conn){
                //die("Connection failed!" . mysqli_connect_error());
             }
             else{
               //echo "Connected";
             }
             if(isset($_POST["regno"]) && isset($_POST["idnumber"])){
                $regno = $_POST["regno"];
                $idnumber = $_POST["idnumber"];
                $sql = "SELECT first_name, last_name, id_number, reg_number FROM Voters WHERE reg_number='$regno' AND id_number='$idnumber'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    echo '<div class="alert alert-success" role="alert">'; echo "Login Succesful"; echo '</div>';
                    while($row = mysqli_fetch_assoc($result)){
                        session_start();
                        $_SESSION["username"] = $row["first_name"] . " " . $row["last_name"];
                        $_SESSION["is_logged_in"] = true;
                        header("Location: home.php");
                    }
                } else{
                    echo '<div class="alert alert-danger" role="alert">'; echo "Invalid registration number or ID number"; echo '</div>';
                }
             }else{
                echo '<div class="alert alert-danger" role="alert">'; echo "Provide all inputs to login"; echo '</div>'; 
             }

             //for the forgot registration number
             if(isset($_POST["idnumber2"])){
                $idnumber2 = $_POST["idnumber2"];
                $sql = "SELECT reg_number FROM Voters WHERE id_number='$idnumber2'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="alert alert-success" role="alert" id="alert">'; echo "Your registration number is: ". $row["reg_number"]; echo '</div>';
                    }
                } else{
                    echo '<div class="alert alert-danger" role="alert" id="alert">'; echo "Invalid ID number"; echo '</div>';
                }
             }
            ?>
            </div>

    </div>


    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Forgot your registration number?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="login.php" method="POST">
            <label>Id number</label>
            <input type="password" id="idnumber2" class="form-control" name="idnumber2" placeholder="enter your id number" required><br>
            <input type="submit" class="form-control btn btn-primary" value="Get registration number"><br>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
  <script src="login.js"></script>  
</body>
</html>