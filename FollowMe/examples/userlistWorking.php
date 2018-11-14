<?php
// Comments go here

?>

<?php
if (!isset($_SESSION)) {
  session_start();
}
require('dbconnection.php');

if (!isset($_SESSION['email'])){
   header('location: login.php');
 }

//Create the SQL query
$sql2 = "SELECT * from fm_users";

//Execute the SQL query
$result2 = $conn->query($sql2);

//From login page, needed for SQL query
$userid = $_SESSION['userid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  while ($row2 = $result2->fetch_assoc()) {

    $userID = $row2['userid'];

    if ($_POST["$userID"] == "yes") {

      $followID = $row2['userid'];
      $sql2 = "INSERT IGNORE INTO fm_follows(followed_by, followed_user) VALUES ('$userID', '$followID')";
      $conn->query($sql2);

    }
    else {

      $followID = $row2['$userid'];
      $sql2 = "DELETE FROM fm_follows WHERE followed_by = '$userID' AND followed_user = '$followID'";
      $conn->query($sql2);
    } //Else loop

  } //While loop

} //POST

$sql = "SELECT * from fm_users;"
//execute SQL
$result = $conn->query($sql);

$sql = "SELECT followed_user FROM fm_follows WHERE followed_by = $userid";

$following_result = $conn->query($sql);

while($row = $following_result->fetch_row()) {

	$followed_user[]=$row[0];

}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Follow Me: User List - By Damian</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- Bootstrap core CSS     -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/nucleo-icons.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-transparent" color-on-scroll="150">
        <div class="container">
			<div class="navbar-translate">
	            <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
	            </button>
	            <a class="navbar-brand" href="#">Follow Me - Profile</a>
			</div>
			<div class="collapse navbar-collapse" id="navbarToggler">
	            <ul class="navbar-nav ml-auto">

	                <li class="nav-item">
	                    <a href="login.php" class="nav-link">Login</a>
	                </li>

									<li class="nav-item">
	                    <a href="#" class="nav-link">
												<?php
													echo $_SESSION['email'];
												?>
											</a>
	                </li>

	            </ul>
	        </div>
		</div>
    </nav>

    <div class="wrapper">
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">
			<div class="filter"></div>
		</div>
  </div>

  <div class="tab-content following">
      <div class="tab-pane active" id="follows" role="tabpanel">
          <div class="row">
              <div class="col-md-6 ml-auto mr-auto">
                  <ul class="list-unstyled follows">

										<?php
										//While loop to gather the info from SQL
                        while ($row = $result->fetch_assoc()) { ?>

										<li>
											<div class="row">
												<div class="col-md-2 col-sm-2 ml-auto mr-auto">
													<img src="<?php echo $row['$image_url'] ; ?> alt="Circle Image" class="img-circle img-no-padding img-responsive">
												</div>
													<div class="col-md-7 col-sm-4  ml-auto mr-auto">
												  	<p> <?php echo $row['first_name'] . $row['last_name'] ; ?>
                              <br/> <small> <?php echo $row['title'] ; ?> </small> </p>
   									 			</div>

                          <div class="col-md-3 col-sm-2">
                          	<label class="form-check-label">
                          		<input class="form-check-input" type="checkbox" name="<?php echo $row['userid'] ; ?>" value="yes" <?php if (in_array($row['userid'], $followed_user)){echo "checked";}?> >
                          		<span class="form-check-sign"></span>
                          	</label>
                        </div>
                      </div>
                    </div>
                	</li>
                <hr />
              <?php } ?>
            </ul>
          </div>
        </div>

              <div class="row">
                  <div class="col-md-4 ml-auto mr-auto text-center">
                      <button class="btn btn-danger btn-lg btn-fill">Submit</button>
  </div>
  </div>
</form>
  </div>

	<footer class="footer section-dark">
        <div class="container">
            <div class="row">
                <nav class="footer-nav">
                    <ul>
                        <li><a href="https://www.creative-tim.com">Creative Tim</a></li>
                        <li><a href="http://blog.creative-tim.com">Blog</a></li>
                        <li><a href="https://www.creative-tim.com/license">Licenses</a></li>
                    </ul>
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright">
                        © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>

<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

</html>
