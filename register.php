<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="login.css">
    <title>register</title>
</head>
<body>
    <div class="container">
        <div class="inner-container">
            <h2>Register</h2><hr>
            <form action="register.php" method="POST">
                <table>
                    <tr>
                        <td><label>First Name<br><input type="text" name="fname" class="form-control" required/></label></td>
                        <td><label>Last Name<br><input type="text" name="lname" class="form-control" required /></label></td>
                    </tr>
                </table>
                <label for="password">ID Number</label><br>
                <input type="password" id="password" class="form-control" name="idnumber" required><br>
                <a href="login.php">Already registered? login here</a>
                <input type="submit" class="form-control" value="Register"><br>
                
            </form>

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
               // echo "Connected";
             }

             if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["idnumber"])){
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $idnumber = $_POST["idnumber"];
                $sql1 = "SELECT id_number FROM Voters WHERE id_number = '$idnumber' ";
                $result = mysqli_query($conn, $sql1);
                if(mysqli_num_rows($result) > 0){
                    echo '<div class="alert alert-danger" role="alert">'; echo "You are already registered"; echo '</div>'; 
                }
                else{
                    $reg_number =strtolower($lname . substr($idnumber, -4));
                    $sql2 = "INSERT INTO Voters (first_name, last_name, id_number, reg_number) VALUES ('$fname', '$lname','$idnumber', '$reg_number');";
                    if(mysqli_query($conn, $sql2)){
                        echo '<div class="alert alert-success" role="alert">'; echo "Registration successful<br>Your registration number is " . $reg_number; echo '</div>';
                    }
                    else{
                        echo "Error: ". $sql2. "<br>". mysqli_error($conn);
                    }
                }
             }else{
                echo '<div class="alert alert-danger" role="alert">'; echo "Please provide all the inputs!! "; echo '</div>';

             }
            ?>
            </div>

    </div>
    
</body>
</html>