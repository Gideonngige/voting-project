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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="results.css">
    <title>results</title>
</head>
<body>
    <div class="container-fluid">
        <div class="head">
            <h3>Results</h3>
        </div>
        <!--governors-->
        <div class="row">
        <div class="col-sm-3"> 
            <h3>Governors</h3>  
            <div class="voteDisplay">
            <table class="table table-bordered"> 
                <thead> 
                    <tr> 
                        <th>Candidate</th>
                        <th>Votes</th> 
                    </tr> 
                </thead> 
                <tbody> 
                <?php 
                    $select_governors = "SELECT governor_id, governor_name FROM Governor";
                    $result = mysqli_query($conn, $select_governors);
                    if ($result->num_rows > 0) { 
                        // Output data of each row 
                        while($row = $result->fetch_assoc()) { 
                            $governor_id = $row['governor_id'];
                            $vote_count = "SELECT COUNT(governor_id) AS vote_count FROM GovernorVotes WHERE governor_id = '$governor_id' ";
                            $result2 = mysqli_query($conn,$vote_count);
                            $row2 = mysqli_fetch_array($result2);

                            echo '<tr>
                            <td>' . htmlspecialchars($row["governor_name"]) . '</td>
                            <td>' . htmlspecialchars($row2["vote_count"]) . '</td>
                            </tr>'; 
                            } 
                            
                            } else {
                                 echo '<tr><td>No names found</td></tr>'; 
                                 } 
                                 ?> 
                                 </tbody> 
                                </table> 
                                </div>
                            </div>
<!--end of governors-->

<!--senator-->                            
        <div class="col-sm-3">
        <h3>Senators</h3>  
            <div class="voteDisplay">
            <table class="table table-bordered"> 
                <thead> 
                    <tr> 
                        <th>Candidate</th>
                        <th>Votes</th> 
                    </tr> 
                </thead> 
                <tbody> 
                <?php 
                    $select_senators = "SELECT senator_id, senator_name FROM Senator";
                    $result = mysqli_query($conn, $select_senators);
                    if ($result->num_rows > 0) { 
                        // Output data of each row 
                        while($row = $result->fetch_assoc()) { 
                            $senator_id = $row['senator_id'];
                            $vote_count = "SELECT COUNT(senator_id) AS vote_count FROM SenatorVotes WHERE senator_id = '$senator_id' ";
                            $result2 = mysqli_query($conn,$vote_count);
                            $row2 = mysqli_fetch_array($result2);

                            echo '<tr>
                            <td>' . htmlspecialchars($row["senator_name"]) . '</td>
                            <td>' . htmlspecialchars($row2["vote_count"]) . '</td>
                            </tr>'; 
                            } 
                            
                            } else {
                                 echo '<tr><td>No names found</td></tr>'; 
                                 } 
                                 ?> 
                            </tbody> 
                                </table> 

                </div>
            </div>
<!--end of senators-->

<!--women rep-->
            <div class="col-sm-3">
            <h3>Women Rep</h3>  
            <div class="voteDisplay">
            <table class="table table-bordered"> 
                <thead> 
                    <tr> 
                        <th>Candidate</th>
                        <th>Votes</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php 
                    $select_womenReps = "SELECT womenRep_id, womenRep_name FROM WomenRep";
                    $result = mysqli_query($conn, $select_womenReps);
                    if ($result->num_rows > 0) { 
                        // Output data of each row 
                        while($row = $result->fetch_assoc()) { 
                            $womenRep_id = $row['womenRep_id'];
                            $vote_count = "SELECT COUNT(womenRep_id) AS vote_count FROM WomenRepVotes WHERE womenRep_id = '$womenRep_id' ";
                            $result2 = mysqli_query($conn,$vote_count);
                            $row2 = mysqli_fetch_array($result2);

                            echo '<tr>
                            <td>' . htmlspecialchars($row["womenRep_name"]) . '</td>
                            <td>' . htmlspecialchars($row2["vote_count"]) . '</td>
                            </tr>'; 
                            } 
                            
                            } else {
                                 echo '<tr><td>No names found</td></tr>'; 
                                 } 
                                 ?> 
                            </tbody> 
                                </table> 
                </div>
            </div>
<!--end of women rep-->
        </div>
        

    
</body>
</html>