<?php
// Comments go here

//$_SESSION['userid']
//sql select follower_id from fm_follows
//Set another sql $result variable; so, $result2 (which is not an array)
//Set result2

// Look at list of who you're following - Loop, fetchrow, -

?>

<?php
session_start();
require('dbconnection.php');

//if ($_SERVER['REQUEST_METHOD'] == 'POST') {} (Just in case POST is needed)


//Create the SQL query
$sql = "SELECT * from fm_users ORDER BY last_name";

//Execute the SQL query
$result = $conn->query($sql);

//From login page, needed for SQL query
$userid = $_SESSION['userid'];


$follow_sql = "SELECT followed_user from fm_follows WHERE followed_by = '$userid'";

$following_result = $conn->query($sql);

while($row = $following_result->fetch_assoc()) {
	$following_id[]=$row["followed_user"];
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
                        while ($row = $result->fetch_assoc()) {
                          $first_name = $row['first_name'];
                          $last_name = $row['last_name'];
                          $image_url = $row['image_url'];
                          $title = $row['title'];

										//Starts the list
										echo "<li>
											<div class=\"row\">
												<div class=\"col-md-2 col-sm-2 ml-auto mr-auto\">
													<img src=\"$image_url\" alt=\"Circle Image\" class=\"img-circle img-no-padding img-responsive\">
												</div>
													<div class=\"col-md-7 col-sm-4  ml-auto mr-auto\">
												  	<p> $first_name $last_name <br/> <small> $title </small> </p>
   									 			</div>

                          <div class=\"col-md-3 col-sm-2\">
          									<div class=\"form-check\">
                          	<label class=\"form-check-label\">
                          		<input class=\"form-check-input\" type=\"checkbox\" value=\"\" (in_array($row['user_id'] == $following_id)) ? 'echo \"checked\"' : 'echo \"unchecked\"';>
                          		<span class=\"form-check-sign\"></span>
                          	</label>
                        </div>
                      </div>
                    </div>
                	</li>";
										}

										//Link the fm_follows columns (followed_by and followed_user) to fm_users as foreign keys, so
										//they're linked to userid in fm_users, so it auto-populates the fm_follows tables with the
										//userid values.
									?>

                  </ul>
              </div>
          </div>
      </div>
      <div class="tab-pane text-center" id="following" role="tabpanel">
          <h3 class="text-muted">Not following anyone yet :(</h3>
          <button class="btn btn-warning btn-round">Find artists</button>
      </div>
  </div>
  </div>
  </div>
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
