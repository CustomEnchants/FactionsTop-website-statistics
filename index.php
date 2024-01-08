<?php
// MySQL connection
$serverName = "";
$username = "";
$password = "";
$dbname = "FactionsTop";

$conn = new mysqli($serverName, $username, $password, $dbname);
if ($conn->connect_error) {
}else{
$sql = "SELECT * FROM data ORDER BY TotalWorth DESC";
$result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Factions Stats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark customNavbar">
        <div class="container-fluid">
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<h3 class="nav-link text-white">CustomEnchantsDevelopment</h3>
					<a class="nav-link text-white" href="#"><h3>Home</h3></a>
					<a class="nav-link text-white" href="#yourdiscordlink"><h3>Discord</h3></a>
				</div>
			</div>
        </div>
    </nav>
	
    <div class="container justify-content-center">
      <div class="row justify-content-center">
	  <div class="col-sm-6">
      <div class="card text-center justify-content-center">
      <div class="card-header">
        <h1>FactionsTop Statistics</h1>
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-sm-4 btn-secondary customButton">
                <h2>Faction</h2>
            </div>
            <div class="col-sm-4 btn-secondary customButton">
                <h2>Leader</h2>
            </div>
            <div class="col-sm-4 btn-secondary customButton">
                <h2>TotalWorth</h2>
            </div>
          </div>
		  <?php
			if ($conn->connect_error) {
				die("Connection has failed due to : " . $conn->connect_error);
				return;
			} 
		  if ($result->num_rows > 0) {
			  while($row = $result->fetch_assoc()) {
			    ?>
		  <div class="row justify-content-center">
		    <div class="col-sm-4 btn-secondary h3"><?php echo htmlspecialchars($row['FactionName']);?></div>
			<div class="col-sm-4 btn-secondary h3"><?php echo htmlspecialchars($row['FactionLeader']);?></div>
			<div class="col-sm-4 btn-secondary h3"><?php echo htmlspecialchars($row['TotalWorthFormatted']);?></div>
		  </div>
				<?php
		      }
		  } else {
		      echo "No data found";
		  }

		  $conn->close();
		  ?>		
        </div>
      </div>
	    <div class="card-footer">
        <h3>Statistics from play.yourserver.com</h3>
      </div>
      </div>
	  </div>
      </div>
    </div>
 
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>