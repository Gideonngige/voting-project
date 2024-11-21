<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="vote.css">
    <title>vote-governor</title>
</head>
<body>
  <div class="container">
    <div class="inner-container">
      <form method="" action="" id="votes">
      <h4>Governor</h4><hr>
        <input type="radio" name="radio" class="radiobtn" />
        <label>Hassan Wakamoni</label><br>
        <input type="radio" name="radio" class="radiobtn"/>
        <label>Gideon Ushindi</label><br>
        <input type="radio" name="radio" class="radiobtn"/>
        <label>Stephen Githae</label><br>
        <input type="radio" name="radio" class="radiobtn"/>
        <label>Jacob Juma</label><hr>
        <input type="button" class="btnBack" value="Back" />
        <input type="button" class="btnNext" onclick="voteSenator()" value="Vote" />
      </form>
    </div>
  </div>

<!--senator-->
<div id="senator">
      <h4>Senator</h4><hr>
      <form method="" action="" id="votes">
        <input type="radio" name="radio" class="radiobtn" />
        <label>Ali Joho</label><br>
        <input type="radio" name="radio" class="radiobtn"/>
        <label>Abdi Omar</label><br>
        <input type="radio" name="radio" class="radiobtn"/>
        <label>Salome Galugalu</label><br>
        <input type="radio" name="radio" class="radiobtn"/>
        <label>James Haki</label><hr>
        <input type="button" class="btnBack" value="Back" />
        <input type="button" class="btnNext" onclick="voteWomanRep()" value="Vote" />
      </form>
    </div>
<!--end of senatpr-->

<!--woman rep-->
<div id="womanRep">
      <h4>Woman Representative</h4><hr>
      <form method="" action="" id="votes">
        <input type="radio" name="radio" class="radiobtn" />
        <label>Mercy Nyaga</label><br>
        <input type="radio" name="radio" class="radiobtn"/>
        <label>Zubeda Rashid</label><br>
        <input type="radio" name="radio" class="radiobtn"/>
        <label>Fatuma Hussein</label><br>
        <input type="radio" name="radio" class="radiobtn"/>
        <label>Ann Wangari</label><hr>
        <input type="button" class="btnBack" value="Back" />
        <input type="button" class="btnNext" onclick="voteWomanRep()" value="Vote" />
      </form>
    </div>
<!--end of woman rep-->
 
  <script>
    var votes = document.getElementById("votes");
    var senator = document.getElementById("senator");
    var womanRep = document.getElementById("womanRep");
    senator.style.display = "none";
    womanRep.style.display = "none";
    function voteSenator(){
      votes.innerHTML = senator.innerHTML;
    }
    function voteWomanRep(){
      votes.innerHTML = womanRep.innerHTML;
    }
  </script>
</body>
</html>