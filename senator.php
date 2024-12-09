<?php 
session_start();
//echo $_SESSION["voter_id"] ;
//echo $_SESSION["is_logged_in"] ;
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
    <title>senator</title>
</head>
<body>
  <div class="container">
    <div class="inner-container">
      <div id="votes"></div>
    </div>
  </div>

<!--senator-->
<div id="senator" style="display:none">
      <h4>Senator</h4><hr>
      <form method="POST" action="senator.php">
      <?php
            $select_senators = "SELECT senator_name FROM Senator";
            $result = mysqli_query($conn, $select_senators);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                echo '<input type="radio" name="senator" class="radiobtn" value="' . htmlspecialchars($row['senator_name']) . '"/><label>' . htmlspecialchars($row['senator_name']) . '</label><br>';
              }
            }else{
              echo "0 results";
            }
            
        ?><hr>
        <a href="vote.php"><input type="button" class="btnBack"  value="Back" /></a>
        <input type="submit" class="btnNext" name="vote_senator" value="Vote" <?php if(!$logged_in) echo 'disabled'; ?>/>
      </form>
      <?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['senator']) && isset($_POST['vote_senator'])){
    $senator = $_POST['senator'];
    
      $select_voter_id = "SELECT voter_id FROM SenatorVotes WHERE voter_id = '$voter_id' ";
      $result1 = mysqli_query($conn, $select_voter_id);
      //echo $senator;
      if(mysqli_num_rows($result1) > 0){
        echo '<br><br><div id="alert" class="alert alert-danger"><strong>You have already voted</strong></div>';
        //echo "You have already voted";
      }
      else{
        $select_senator = "SELECT senator_id FROM Senator WHERE senator_name = '$senator' ";
        $result = mysqli_query($conn, $select_senator);
        if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
        $senator_id = $row['senator_id'];
        }
        $insert_senator_vote = "INSERT INTO SenatorVotes (voter_id, senator_id) VALUES ('$voter_id', '$senator_id')";
        mysqli_query($conn, $insert_senator_vote);
        header("Location: womenrep.php");

      }
    
  }
 
    
  }
}

?>
    </div>
<!--end of senatpr-->


 
  <script>
    var votes = document.getElementById("votes");
    var senator = document.getElementById("senator");
    votes.innerHTML = senator.innerHTML;
  </script>
</body>
</html>