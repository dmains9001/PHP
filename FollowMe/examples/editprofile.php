<?php
//If no session is open, start. *
//Add name attributes to form elements *
//Set default values for each form element from $_SESSION *
//Update submitted values to database *
//Update submitted values to $_SESSION
?>

<?php
session_start();
require('dbconnection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $email = $_SESSION['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $title = $_POST['title'];
  $description = $_POST['description'];

  $sql = "UPDATE fm_users SET first_name = '$firstname', last_name = '$lastname', title = '$title', description = '$description' where email = '$email'";

//  Code for testing purposes
//   if (mysqli_query($conn, $sql)) {
//     echo "Record updated successfully";
// } else {
//     echo "Error updating record: " . mysqli_error($conn);
// }

  $conn->query($sql);
  if ($conn) {
    $_SESSION['firstname'] = $_POST['firstname'];
    $_SESSION['lastname'] = $_POST['lastname'];
    $_SESSION['title'] = $_POST['title'];
    $_SESSION['description'] = $_POST['description'];

  } //closes sql query IF statement
} //closes POST condition

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Follow Me: Edit Profile - By Damian</title>

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

		<div class="section landing-section">
				<div class="container">
						<div class="row">
								<div class="col-md-8 ml-auto mr-auto">
										<h2 class="text-center">Edit Your Profile</h2>
										<form class="contact-form" action="" method="post">

												<div class="row">

														<div class="col-md-6">
																<label>First Name</label>
																<div class="input-group">
																	<span class="input-group-addon">
																	<i class="nc-icon nc-single-02"></i>
																	</span>
																	<input value="<?php echo $_SESSION['firstname'];?>" type="text" name="firstname" class="form-control" placeholder="First Name">
																</div>
														</div>

														<div class="col-md-6">
																<label>Last Name</label>
																<div class="input-group">
																	<span class="input-group-addon">
																		<i class="nc-icon nc-single-02"></i>
																	</span>
																	<input value="<?php echo $_SESSION['lastname'];?>" type="text" name="lastname" class="form-control" placeholder="Last Name">
																</div>
														</div>

												</div> <!-- Ends the first row of forms -->

												<label>Title</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="nc-icon nc-tag-content"></i>
													</span>
													<input value="<?php echo $_SESSION['title'];?>" type="text"  name="title" class="form-control" placeholder="Title">
												</div>

												<label>Description</label>
												<textarea class="form-control" rows="4" input value="<?php echo $_SESSION['description'];?>" name="description" placeholder="Describe yourself for everyone!"></textarea>
												<div class="input-group">
														<div class="col-md-4 ml-auto mr-auto text-center">
																<button class="btn btn-danger btn-lg btn-fill" type="submit">Update</button>
														</div>
												</div>
										</form>
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

<?php
//Echoes the session variables for testing purposes.
//echo "Logged in as: " . $_SESSION['email'];
//echo "Your first name is: " . $_SESSION['firstname'];
//echo "Your last name is: " . $_SESSION['lastname'];
//echo "Your title is: " . $_SESSION['title'];
?>

<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

</html>
