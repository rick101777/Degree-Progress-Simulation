<?php $title = "Progress";?>
<?php require_once ("header.php"); ?>
<html lang="en">
  <body>
    <div class="title-bar">
      <h1>Degree Progress Simulation</h1>
    </div>
    <div class="space"></div>
    <form class="form-group" action = "/Algorithm.php" method = "POST">
      <div class="box">
        <label>Major</label>
        <select class="form-control" name = "Major">
          <option>Select Major</option>
          <option>Computer Science</option>
          <option>Information Systems</option>
        </select>
      </br>
        <label>Concentration</label>
        <select class="form-control" name = "Concentration">
          <option>Select Concentration</option>
          <option>CSC: Standard</option>
          <option>IS: Standard</option>
          <option>IS: Business Analysis/Systems Analysis</option>
          <option>IS: Business Intelligence</option>
          <option>IS: Database Administration</option>
          <option>IS: IT Enterprise Management</option>
        </select>
      <br>
        <label>Classes Per-Quarter</label>
        <select class="form-control" name = "Quantity">
          <option>Select Number of Courses Per Quarter</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
        </select>
      <br>
        <label>Class Location</label>
        <select class = "form-control" name = "Location">
          <option>Select Prefered Location</option>
          <option>In-Person</option>
          <option>Online</option>
        </select>
        <div class="space-2"></div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </form>

    <div class="space-4"></div>

    <div class = "section-a">
      <div class = "container">
        <div class="row">
          <div class ="col-md-6">
            <i class="fas fa-phone"></i>
            <h3>Contact</h3>
            <p>This will take you to our contact information. You will learn how to set up an appointment with a consuler. It will also give you the location of the CDM college.</p>
            <a href="contact.php" class="btn btn-primary">GO!</a>
          </div>

          <div class ="col-md-6">
            <i class="fas fa-id-card"></i>
            <h3>Profile</h3>
            <p>This will take you to your profile page. Here you will be able to see your major, concentration, email, and name. </p>
            <a href="profile.php" class="btn btn-primary">GO!</a>
          </div>
        </div>
      </div>
    </div>

    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
  </body>
</html>
<?php require_once ("footer.php"); ?>
