<?php
$title = "Student Search Results";
require_once ("header.php");
include ('../includes/dbh.inc.php');
 ?>
<html>

<div class="title-bar">
  <h1>User Search</h1>
</div>

<div class="search_bar">
  <a href="user_search.php" class="btn btn-primary btn-sm" role="button">Do Another Search</a>
</div>

<div>
<?php
  if (isset($_POST['submit-search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT ID, Email, FirstName, LastName, PID, Department, MajorList FROM population WHERE ID LIKE '%$search%' OR Email LIKE '%$search%' OR FirstName LIKE '%$search%' OR LastName LIKE '%$search%' OR MajorList LIKE '%$search%' OR Department LIKE '%$search%' OR PID LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    if (empty($search)) {
      header("Location: user_search.php?search=null");
      exit();
    }
    elseif ($queryResult > 0) {
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
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      while ($row=mysqli_fetch_assoc($result)) {
       echo "<tr><td>{$row['ID']}</td> <td>{$row['Email']} </td> <td>{$row['FirstName']}</td> <td>{$row['LastName']}</td> <td>{$row['PID']} </td> <td>{$row['Department']} </td> <td>{$row['MajorList']}</td></tr>";
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
