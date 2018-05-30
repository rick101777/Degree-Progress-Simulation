<?php $title = "CSC Requirements";?>
<?php require_once ("header.php");
include ('includes/dbh.inc.php');
?>

<html lang="en">
  <body>
    <div class="title-bar">
      <h1>CSC Requirements</h1>
    </div>
    <div class="space"></div>
    <div class="search_bar">
      <a href="degree_requirements.php" class="btn btn-primary btn-sm" role="button">Look At Another Dgree Requirement</a>
    </div>
    <h3>CSC Major Electives</h3>
    <?php
    $queryM="SELECT * FROM CSC_REQUIREMENTS WHERE REQUIREMENT = 'M'";
    $result= mysqli_query($conn, $queryM);
    echo "<table class='table' border = '1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>CID</th>";
    echo "<th scope='col'>AREA</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row=mysqli_fetch_assoc($result)) {
      echo "<tr><td>{$row['CID']}</td> <td>{$row['AREA']} </td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    ?>
    <br>
    <h3>CSC Requirements</h3>
    <?php
    $queryR="SELECT * FROM CSC_REQUIREMENTS WHERE REQUIREMENT = 'R'";
    $result= mysqli_query($conn, $queryR);
    echo "<table class='table' border = '1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>CID</th>";
    echo "<th scope='col'>AREA</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row=mysqli_fetch_assoc($result)) {
      echo "<tr><td>{$row['CID']}</td> <td>{$row['AREA']} </td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    ?>
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
  </body>
</html>
<?php require_once ("footer.php"); ?>
