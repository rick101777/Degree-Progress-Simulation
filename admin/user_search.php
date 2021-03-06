<?php $title = "User Search";?>
<?php require_once ("header.php");
include ('../includes/dbh.inc.php');
?>

<html>
<body>
  <div class="title-bar">
    <h1>User Search</h1>
  </div>
  <div class="search_bar">
    <form action="search_s.php" method="POST">
      <input type="text" name="search" placeholder="Search for a user">
      <button class="btn btn-primary btn-sm" type="submit" name="submit-search">Search</button>
    </form>
  </div>
  <script src="../bower_components/jquery/dist/jquery.js"></script>
  <script src="../bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
</body>
</html>

<?php
$query="SELECT ID, EMAIL, FNAME, LNAME, PID, DEPARTMENT, MAJOR, CONCENTRATION FROM POPULATION";
$result= mysqli_query($conn, $query);
echo "<table class='table' border = '1'>";
echo "<thead>";
echo "<tr>";
echo "<th scope='col'>User ID</th>";
echo "<th scope='col'>Email</th>";
echo "<th scope='col'>First Name</th>";
echo "<th scope='col'>Last Name</th>";
echo "<th scope='col'>PID</th>";
echo "<th scope='col'>Department</th>";
echo "<th scope='col'>Major</th>";
echo "<th scope='col'>Concentration</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row=mysqli_fetch_assoc($result)) {
 echo "<tr><td>{$row['ID']}</td> <td>{$row['EMAIL']} </td> <td>{$row['FNAME']}</td> <td>{$row['LNAME']}</td> <td>{$row['PID']} </td> <td>{$row['DEPARTMENT']} </td> <td>{$row['MAJOR']}</td> <td>{$row['CONCENTRATION']}</td></tr>";
}
echo "</tbody>";
echo "</table>";
?>
<?php require_once ("../footer.php"); ?>
