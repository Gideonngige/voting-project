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
                        <td><label>First Name<br><input type="text" name="fname" class="form-control" /></label></td>
                        <td><label>Last Name<br><input type="text" name="lname" class="form-control" /></label></td>
                    </tr>
                </table>
                <label for="county">County</label><br>
                <select name="county" class="form-control">
                    <option value="">Select County</option>
                    <?php
                        $counties = array("Lamu", "Tana River", "Mombasa", "Kilifi");
                        foreach ($counties as $county) {
                            echo "<option value='$county'>$county</option>";
                        }
                   ?>
                </select>
                <label for="password">ID Number</label><br>
                <input type="password" id="password" class="form-control" name="idnumber" required><br>
                <input type="submit" class="form-control" value="Register">
            </form>
            </div>

    </div>
    
</body>
</html>