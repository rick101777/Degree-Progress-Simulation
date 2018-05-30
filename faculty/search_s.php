<?php
$title = "Student Search Results";
require_once ("header.php");
include ('../includes/dbh.inc.php');
 ?>
<html>

<div class="title-bar">
  <h1>Student Search</h1>
</div>

<div class="search_bar">
  <a href="student_search.php" class="btn btn-primary btn-sm" role="button">Do Another Search</a>
</div>

<div>
<?php
  if (isset($_POST['submit-search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT ID, EMAIL, FNAME, LNAME, MAJOR, CONCENTRATION FROM POPULATION WHERE PID='STU' AND (ID LIKE '%$search%' OR EMAIL LIKE '%$search%' OR FNAME LIKE '%$search%' OR LNAME LIKE '%$search%' OR MAJOR LIKE '%$search%' OR CONCENTRATION LIKE '%$search%')";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    if (empty($search)) {
      header("Location: student_search.php?search=null");
      exit();
    }
    elseif ($queryResult > 0) {
      echo "<table class='table' border = '1'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th scope='col'>Student ID</th>";
      echo "<th scope='col'>Email</th>";
      echo "<th scope='col'>First Name</th>";
      echo "<th scope='col'>Last Name</th>";
      echo "<th scope='col'>Major</th>";
      echo "<th scope='col'>Concentration</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      while ($row=mysqli_fetch_assoc($result)) {
       echo "<tr><td>{$row['ID']}</td> <td>{$row['EMAIL']} </td> <td>{$row['FNAME']}</td> <td>{$row['LNAME']}</td> <td>{$row['MAJOR']}</td> <td>{$row['CONCENTRATION']}</td></tr>";
      }
      echo "</tbody>";
      echo "</table>";
    }
    else{
      echo "There are no results";
    }
  }
 ?>

</div>
<script src="../bower_components/jquery/dist/jquery.js"></script>
<script src="../bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
</body>
</html>
