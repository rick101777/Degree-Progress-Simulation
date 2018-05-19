<?php
$title = "Course Search Results";
require_once ("header.php");
include ('includes/dbh.inc.php');
 ?>
<html>

<div class="title-bar">
  <h1>Course Search</h1>
</div>

<div class="search_bar">
  <a href="course_search.php" class="btn btn-primary btn-sm" role="button">Do Another Search</a>
</div>

<div>
<?php
  if (isset($_POST['submit-search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM t_courses WHERE SUBJECT_DESC LIKE '%$search%' OR TITLE LIKE '%$search%' OR LOCATION LIKE '%$search%' OR COURSE_ID LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    if (empty($search)) {
      header("Location: course_search.php?search=null");
      exit();
    }
    elseif ($queryResult > 0) {
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
    }
    else{
      echo "There are no results";
    }
  }
 ?>

</div>
<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
</body>
</html>
