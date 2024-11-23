<?php 
session_start();
echo $_SESSION["voter_id"] ;
echo $_SESSION["is_logged_in"] ;
$logged_in = false;
if(isset($_SESSION["voter_id"]) && isset($_SESSION["is_logged_in"])){
  $voter_id = $_SESSION["voter_id"];
  $logged_in = true;
}

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="vote.css">
    <title>women rep</title>
</head>
<body>
  <div class="container">
    <div class="inner-container">
      <div id="votes"></div>
    </div>
  </div>

<!--women rep-->
<div id="womenRep" style="display:none">
      <h4>Woman Representative</h4><hr>
      <form method="POST" action="womenrep.php">
      <?php
            $select_womenReps = "SELECT womenRep_name FROM WomenRep";
            $result = mysqli_query($conn, $select_womenReps);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                echo '<input type="radio" name="womenRep" class="radiobtn" value="' . htmlspecialchars($row['womenRep_name']) . '"/><label>' . htmlspecialchars($row['womenRep_name']) . '</label><br>';
              }
            }else{
              echo "0 results";
            }
            
        ?><hr>
        <a href="senator.php"><input type="button" class="btnBack" onclick="backToSenator()" value="Back" /></a>
        <input type="submit" class="btnNext" name="vote_womenRep"  value="Vote" <?php if(!$logged_in) echo 'disabled'; ?> />
      </form>
      <?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['womenRep']) && isset($_POST['vote_womenRep'])){
    $womenRep = $_POST['womenRep'];
    
      $select_voter_id = "SELECT voter_id FROM WomenRepVotes WHERE voter_id = '$voter_id' ";
      $result1 = mysqli_query($conn, $select_voter_id);
      echo $womenRep;
      if(mysqli_num_rows($result1) > 0){
        echo "You have already voted";
      }
      else{
        $select_womenRep = "SELECT womenRep_id FROM WomenRep WHERE womenRep_name = '$womenRep' ";
        $result = mysqli_query($conn, $select_womenRep);
        if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
        $womenRep_id = $row['womenRep_id'];
        }
        $insert_womenRep_vote = "INSERT INTO WomenRepVotes (voter_id, womenRep_id) VALUES ('$voter_id', '$womenRep_id')";
        mysqli_query($conn, $insert_womenRep_vote);
        header("Location: results.php");

      }
    
  }
 
    
  }
}

?>
    </div>
<!--end of woman rep-->
 
  <script>
    var votes = document.getElementById("votes");
    var womenRep = document.getElementById("womenRep");
    votes.innerHTML = womenRep.innerHTML;
  </script>
</body>
</html>