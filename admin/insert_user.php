<?php $title = "Insert User";?>
<?php require_once ("header.php"); ?>
<html>
<body>
  <div class="title-bar">
    <h1>Insert User</h1>
  </div>
  <div class="space"></div>
  <form action="insert_u.php" method="POST">
    <div class="form-group">
    <label>ID:</label>
     <input class="form-control" type="text" name="uid" placeholder="123456">
   </div>
   <div class="form-group">
     <label>Email:</label>
     <input class="form-control" type="text" name="email" placeholder="Email@gmail.com">
   </div>
   <div class="form-group">
     <label>Password:</label>
     <input class="form-control" type="text" name="pwd" placeholder="password">
   </div>
   <div class="form-group">
     <label>First Name:</label>
     <input class="form-control" type="text" name="fname" placeholder="John">
   </div>
   <div class="form-group">
     <label>Last Name:</label>
     <input class="form-control" type="text" name="lname" placeholder="Smith">
   </div>
   <div class="form-group">
     <label>PID:</label>
     <input class="form-control" type="text" name="pid" placeholder="STU">
   </div>
   <div class="form-group">
     <label>Department:</label>
     <input class="form-control" type="text" name="dept" placeholder="Information Systems">
   </div>
   <div class="form-group">
     <label>Major:</label>
     <input class="form-control" type="text" name="major" placeholder="Computer Science">
   </div>
   <button type="submit" class="btn btn-primary" name="submit">Submit</button>
   <div class="space-2"></div>
  </form>
<script src="../bower_components/jquery/dist/jquery.js"></script>
<script src="../bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
</body>
</html>
<?php require_once ("../footer.php"); ?>
