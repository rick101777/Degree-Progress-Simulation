<?php $title = "Delete User";?>
<?php require_once ("header.php"); ?>
<html>
<body>
  <div class="title-bar">
    <h1>Delete User</h1>
  </div>
  <div class="space"></div>
  <form action="delete_u.php" method="POST">
    <div class="form-group">
    <label>ID:</label>
     <input class="form-control" type="text" name="uid" placeholder="Input user ID for the user to be deleted">
   </div>
   <button type="submit" class="btn btn-primary" name="submit">Submit</button>
   <div class="space-3"></div>
  </form>
<script src="../bower_components/jquery/dist/jquery.js"></script>
<script src="../bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
</body>
</html>
<?php require_once ("../footer.php"); ?>
