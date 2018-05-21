<?php $title = "Insert Class";?>
<?php require_once ("header.php"); ?>
<html>
<body>
  <div class="title-bar">
    <h1>Insert Class</h1>
  </div>
  <div class="space"></div>
  <form action="insert_c.php" method="POST">
    <div class="form-group">
    <label>Course ID:</label>
     <input class="form-control" type="text" name="cid" placeholder="1234">
   </div>
   <div class="form-group">
     <label>Subject:</label>
     <input class="form-control" type="text" name="sub" placeholder="CSC">
   </div>
   <div class="form-group">
     <label>Cat Number:</label>
     <input class="form-control" type="text" name="cat" placeholder="400">
   </div>
   <div class="form-group">
     <label>Title:</label>
     <input class="form-control" type="text" name="tname" placeholder="Title">
   </div>
   <div class="form-group">
     <label>Consent:</label>
     <input class="form-control" type="text" name="con" placeholder="Y or N">
   </div>
   <div class="form-group">
     <label>Subject Description:</label>
     <input class="form-control" type="text" name="subd" placeholder="Computer Science">
   </div>
   <div class="form-group">
     <label>Location:</label>
     <input class="form-control" type="text" name="loc" placeholder="Loop">
   </div>
   <div class="form-group">
     <label>Prereq:</label>
     <input class="form-control" type="text" name="pre" placeholder="Y OR N">
   </div>
   <div class="form-group">
     <label>Autumn:</label>
     <input class="form-control" type="text" name="atm" placeholder="Y OR N">
   </div>
   <div class="form-group">
     <label>Winter:</label>
     <input class="form-control" type="text" name="win" placeholder="Y OR N">
   </div>
   <div class="form-group">
     <label>Spring:</label>
     <input class="form-control" type="text" name="spr" placeholder="Y OR N">
   </div>
   <div class="form-group">
     <label>Summer:</label>
     <input class="form-control" type="text" name="sum" placeholder="Y OR N">
   </div>
   <button type="submit" class="btn btn-primary" name="submit">Submit</button>
   <div class="space-2"></div>
  </form>
<script src="../bower_components/jquery/dist/jquery.js"></script>
<script src="../bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
</body>
</html>
<?php require_once ("../footer.php"); ?>
