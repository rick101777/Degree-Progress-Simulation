<?php $title = "Home";?>
<?php require_once ("header.php"); ?>

<html lang="en">
  <body>
    <div class = "showcase">
      <div class = "container">
        <h1>Welcome</h1>
        <p class = "lead">lipsum asdwpf mgsn hfghsding jihnfkisng</p>
      </div>
    </div>

    <div class = "section-a">
      <div class = "container">
        <div class="row">
          <div class ="col-md-4">
            <i class="fas fa-book"></i>
            <h3>Degree Progress</h3>
            <p>Vestibulum neque erat, semper elementum justo posuere, porta eleifend quam. Cras viverra ultricies lacinia. Nulla elementum ligula sed nunc finibus commodo. Curabitur efficitur velit mauris, pulvinar volutpat tortor egestas commodo. Praesent eget ante commodo, iaculis </p>
            <a href="progress.php" class="btn btn-primary">GO!</a>
          </div>

          <div class ="col-md-4">
            <i class="fas fa-id-card"></i>
            <h3>Profile</h3>
            <p>Vestibulum neque erat, semper elementum justo posuere, porta eleifend quam. Cras viverra ultricies lacinia. Nulla elementum ligula sed nunc finibus commodo. Curabitur efficitur </p>
            <a href="profile.php" class="btn btn-primary">GO!</a>
          </div>

          <div class ="col-md-4">
            <i class="fas fa-phone"></i>
            <h3>Contact</h3>
            <p>Vestibulum neque erat, semper elementum justo posuere, porta eleifend quam. Cras viverra ultricies lacinia. Nulla elementum ligula sed nunc finibus commodo. Curabitur efficitur .</p>
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
