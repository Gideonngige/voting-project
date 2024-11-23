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
    <title>vote</title>
</head>
<body>
  <div class="container">
    <div class="inner-container">
      <div id="votes"></div>
    </div>
  </div>

<!--governor-->
<div id="governor" style="display:none">
<h4>Governor</h4><hr>
<form action="vote.php" method="POST">
      <?php
        $select_governors = "SELECT governor_name FROM Governor";
        $result = mysqli_query($conn, $select_governors);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
            echo '<input type="radio" name="governor" class="radiobtn" value="' . htmlspecialchars($row['governor_name']) . '"/><label>' . htmlspecialchars($row['governor_name']) . '</label><br>';
        }
        }else{
          echo "0 results";
        }
            
        ?><hr>
<a href="home.php"><input type="button" class="btnBack" onclick="backToSenator()" value="Back" /></a>
<input type="submit" class="btnNext" name="vote_governor"   value="Vote" <?php if(!$logged_in) echo 'disabled'; ?> />
</form>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['governor']) && isset($_POST['vote_governor'])){
    $governor = $_POST['governor'];
    
      $select_voter_id = "SELECT voter_id FROM GovernorVotes WHERE voter_id = '$voter_id' ";
      $result1 = mysqli_query($conn, $select_voter_id);
      echo $governor;
      if(mysqli_num_rows($result1) > 0){
        echo "You have already voted";
      }
      else{
        $select_governor = "SELECT governor_id FROM Governor WHERE governor_name = '$governor' ";
        $result = mysqli_query($conn, $select_governor);
        if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
        $governor_id = $row['governor_id'];
        }
        $insert_governor_vote = "INSERT INTO GovernorVotes (voter_id, governor_id) VALUES ('$voter_id', '$governor_id')";
        mysqli_query($conn, $insert_governor_vote);
        header("Location: senator.php");

      }
    
  }
 
    
  }
}

?>
</div>
<!--end of governor-->

<!--senator-->
<div id="senator" style="display:none">
      <h4>Senator</h4><hr>
      <form method="POST" action="vote.php">
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
        <input type="button" class="btnBack" onclick="backToGovernor()" value="Back" />
        <input type="button" class="btnNext" onclick="voteWomanRep()" value="Vote" />
      </form>
    </div>
<!--end of senatpr-->

<!--woman rep-->
<div id="womanRep" style="display:none">
      <h4>Woman Representative</h4><hr>
      <form method="POST" action="vote.php">
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
        <input type="button" class="btnBack" onclick="backToSenator()" value="Back" />
        <input type="button" class="btnNext" onclick="voteWomanRep()" value="Vote" />
      </form>
    </div>
<!--end of woman rep-->
 
  <script>
    var votes = document.getElementById("votes");
    var governor = document.getElementById("governor");
    var senator = document.getElementById("senator");
    votes.innerHTML = governor.innerHTML;
    function voteSenator(){
      votes.innerHTML = senator.innerHTML;
    }
  </script>
</body>
</html>