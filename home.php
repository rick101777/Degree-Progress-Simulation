<?php $title = "Home";?>
<?php require_once ("header.php"); ?>

<html lang="en">
  <body>
    <div class = "showcase">
      <div class = "container">
        <h1>Welcome</h1>
        <p class = "lead">to Depaul degree progress simulator</p>
      </div>
    </div>

    <div class = "section-a">
      <div class = "container">
        <div class="row">
          <div class ="col-md-4">
            <i class="fas fa-book"></i>
            <h3>Degree Progress</h3>
            <p>This will take you to the degree progress simulation page. Here you will be able to create a simulation of how long it would take you to finish your degree! </p>
            <a href="progress.php" class="btn btn-primary">GO!</a>
          </div>

          <div class ="col-md-4">
            <i class="fas fa-id-card"></i>
            <h3>Profile</h3>
            <p>This will take you to your profile page. Here you will be able to see your major, concentration, email, and name. </p>
            <a href="profile.php" class="btn btn-primary">GO!</a>
          </div>

          <div class ="col-md-4">
            <i class="fas fa-phone"></i>
            <h3>Contact</h3>
            <p>This will take you to our contact information. You will learn how to set up an appointment with a consuler. It will also give you the location of the CDM college.</p>
            <a href="contact.php" class="btn btn-primary">GO!</a>
          </div>
        </div>
      </div>
    </div>

    <?php require_once ("footer.php"); ?>
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
  </body>
</html>
