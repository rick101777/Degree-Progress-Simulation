<?php $title = "Progress";?>
<?php require_once ("header.php"); ?>
<html lang="en">
  <body>
    <div class="title-bar">
      <h1>Degree Progress Simulation</h1>
    </div>
    <div class="space"></div>
    <form class="form-group">
      <div class="box">
        <label>Major</label>
        <select class="form-control">
          <option>Select Major</option>
          <option>Computer Science</option>
          <option>Information Systems</option>
        </select>
      </br>
        <label>Concentration</label>
        <select class="form-control">
          <option>Select Concentration</option>
          <option>Computer Science</option>
          <option>Information Systems</option>
        </select>
        <div class="space-2"></div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
      <div class="space-3"></div>
    </form>

    <script src="../bower_components/jquery/dist/jquery.js"></script>
    <script src="../bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
  </body>
</html>
<?php require_once ("../footer.php"); ?>
