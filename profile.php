<?php $title = "Profile";?>
<?php require_once ("header.php");
$fname= "<h4>" . $_SESSION['s_first'] . "<h4>";
$lname= "<h4>" . $_SESSION['s_last'] . "<h4>";
$major= "<h4>" . $_SESSION['s_major'] . "<h4>";
$email= "<h4>" . $_SESSION['s_email'] . "<h4>";
$concentration= "<h4>" . $_SESSION['s_con'] . "<h4>";
 ?>
<html lang="en">
  <body>
    <div class="title-bar">
      <h1>Profile</h1>
    </div>

    <div class="main">
      <div class="container">
        <div class="row">
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">Information</h4>
            </div>
            <div class="panel-body">
              <div class="well">
                <h3>Name:</h3>
                <p><?php echo $fname.$lname ?></p>
				<form action="/editProfile.php" method= "post">
					<input type="text" name="fname" placeholder="Edit First Name">
					<button class="btn btn-primary btn-sm" type="submit" name="submit-FName-Change">Change</button>
					<input type="text" name="lname" placeholder="Edit Last Name">
					<button class="btn btn-primary btn-sm" type="submit" name="submit-LName-Change">Change</button>
				</form>
              </div>
              <div class="well">
                <h3>Major:</h3>
                <p><?php echo $major ?></p>
				<form action= "/editProfile.php" method= "post">
					<input type= "text" name= "major" placeholder= "Change Major">
					<br><br>
					<input type= "submit" value= "Submit">
				</form>
              </div>
              <div class="well">
                <h3>Concentration:</h3>
                <p><?php echo $concentration ?></p>
				<form action= "/editProfile.php" method= "post">
					<input type= "text" name= "concentration" placeholder= "Change Concentration">
					<br><br>
					<input type= "submit" value= "Submit">
				</form>
              </div>
              <div class="well">
                <h3>Email:</h3>
                <p><?php echo $email ?></p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <img src="img/depaul.jpg">
        </div>
      </div>
    </div>
  </div>



    <div class = "section-a">
      <div class = "container">
        <div class="row">
          <div class ="col-md-6">
            <i class="fas fa-book"></i>
            <h3>Degree Progress</h3>
            <p>This will take you to the degree progress simulation page. Here you will be able to create a simulation of how long it would take you to finish your degree! </p>
            <a href="progress.php" class="btn btn-primary">GO!</a>
          </div>

          <div class ="col-md-6">
            <i class="fas fa-phone"></i>
            <h3>Contact</h3>
            <p>This will take you to our contact information. You will learn how to set up an appointment with a consuler. It will also give you the location of the CDM college.</p>
            <a href="contact.php" class="btn btn-primary">GO!</a>
          </div>
        </div>
      </div>
    </div>
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
  </body>
</html>
<?php require_once ("footer.php"); ?>
