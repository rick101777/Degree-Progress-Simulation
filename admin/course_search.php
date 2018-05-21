<?php $title = "Course Search";?>
<?php require_once ("header.php");
include ('../includes/dbh.inc.php');
?>

<html>
<body>
  <div class="title-bar">
    <h1>Course Search</h1>
  </div>
  <div class="search_bar">
    <form action="search_c.php" method="POST">
      <input type="text" name="search" placeholder="Search for a course">
      <button class="btn btn-primary btn-sm" type="submit" name="submit-search">Search</button>
    </form>
  </div>
  <script src="../bower_components/jquery/dist/jquery.js"></script>
  <script src="../bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
</body>
</html>

<?php
$query="SELECT * FROM t_courses";
$result= mysqli_query($conn, $query);
echo "<table class='table' border = '1'>";
echo "<thead>";
echo "<tr>";
echo "<th scope='col'>Course ID</th>";
echo "<th scope='col'>Subject</th>";
echo "<th scope='col'>Cat Number</th>";
echo "<th scope='col'>Title</th>";
echo "<th scope='col'>Consent</th>";
echo "<th scope='col'>Subject_Desc</th>";
echo "<th scope='col'>Location</th>";
echo "<th scope='col'>Prereq</th>";
echo "<th scope='col'>Autumn</th>";
echo "<th scope='col'>Winter</th>";
echo "<th scope='col'>Spring</th>";
echo "<th scope='col'>Summer</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row=mysqli_fetch_assoc($result)) {
  echo "<tr><td>{$row['COURSE_ID']}</td> <td>{$row['SUBJECT']} </td> <td>{$row['CAT_NUMBER']}</td> <td>{$row['TITLE']}</td> <td>{$row['CONSENT']}</td> <td>{$row['SUBJECT_DESC']}</td> <td>{$row['LOCATION']}</td> <td>{$row['PREREQ']}</td> <td>{$row['AUTUMN']}</td> <td>{$row['WINTER']}</td> <td>{$row['SPRING']}</td> <td>{$row['SUMMER']}</td> </tr>";
}
echo "</tbody>";
echo "</table>";
?>
<?php require_once ("../footer.php"); ?>
