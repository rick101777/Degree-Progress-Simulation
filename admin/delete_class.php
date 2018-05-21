<?php $title = "Delete Class";?>
<?php require_once ("header.php"); ?>
<html>
<body>
  <div class="title-bar">
    <h1>Delete Class</h1>
  </div>
  <div class="space"></div>
  <form action="delete_c.php" method="POST">
    <div class="form-group">
    <label>Class ID:</label>
     <input class="form-control" type="text" name="cid" placeholder="Input course ID for the class to be deleted">
   </div>
   <button type="submit" class="btn btn-primary" name="submit">Submit</button>
   <div class="space-3"></div>
  </form>
</body>
<script src="../bower_components/jquery/dist/jquery.js"></script>
<script src="../bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
</html>
<?php require_once ("../footer.php"); ?>
