<?php $title = "IS Standard Requirements";?>
<?php require_once ("header.php");
include ('includes/dbh.inc.php');
?>

<html lang="en">
  <body>
    <div class="title-bar">
      <h1>IS Standard Requirements</h1>
    </div>
    <div class="space"></div>
    <div class="search_bar">
      <a href="degree_requirements.php" class="btn btn-primary btn-sm" role="button">Look At Another Degree Requirement</a>
    </div>
	<h3>IS Standard: Requirements</h3>
    <?php
    $queryR="SELECT CID, SUBJECT, CAT_NUMBER, TITLE, CONSENT, LOCATION, AUTUMN, WINTER, SPRING, SUMMER
	FROM IS_REQUIREMENTS_STD JOIN COURSES ON IS_REQUIREMENTS_STD.CID = COURSES.COURSE_ID WHERE REQUIREMENT = 'R'";
    $result= mysqli_query($conn, $queryR);
    echo "<table class='table' border = '1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>COURSE ID</th>";
	echo "<th scope='col'>SUBJECT</th>";
	echo "<th scope='col'>CATALOG NUMBER</th>";
	echo "<th scope='col'>TITLE</th>";
	echo "<th scope='col'>CONSENT</th>";
	echo "<th scope='col'>LOCATION</th>";
	echo "<th scope='col'>AUTUMN</th>";
	echo "<th scope='col'>WINTER</th>";
	echo "<th scope='col'>SPRING</th>";
	echo "<th scope='col'>SUMMER</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row=mysqli_fetch_assoc($result)) {
      echo "<tr><td>{$row['CID']}</td> <td>{$row['SUBJECT']} </td> <td>{$row['CAT_NUMBER']} </td> <td>{$row['TITLE']} </td> <td>{$row['CONSENT']} </td> 
		<td>{$row['LOCATION']} </td> <td>{$row['AUTUMN']} </td> <td>{$row['WINTER']} </td> <td>{$row['SPRING']} </td> <td>{$row['SUMMER']} </td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    ?>
    <br>
    <h3>IS Standard: Major Electives</h3>
    <?php
    $queryM="SELECT CID, SUBJECT, CAT_NUMBER, TITLE, CONSENT, LOCATION, AUTUMN, WINTER, SPRING, SUMMER
	FROM IS_REQUIREMENTS_STD JOIN COURSES ON IS_REQUIREMENTS_STD.CID = COURSES.COURSE_ID WHERE REQUIREMENT = 'M'";
    $result= mysqli_query($conn, $queryM);
    echo "<table class='table' border = '1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>COURSE ID</th>";
	echo "<th scope='col'>SUBJECT</th>";
	echo "<th scope='col'>CATALOG NUMBER</th>";
	echo "<th scope='col'>TITLE</th>";
	echo "<th scope='col'>CONSENT</th>";
	echo "<th scope='col'>LOCATION</th>";
	echo "<th scope='col'>AUTUMN</th>";
	echo "<th scope='col'>WINTER</th>";
	echo "<th scope='col'>SPRING</th>";
	echo "<th scope='col'>SUMMER</th>";
	
    //echo "<th scope='col'>Requirement</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row=mysqli_fetch_assoc($result)) {
      echo "<tr><td>{$row['CID']}</td> <td>{$row['SUBJECT']} </td> <td>{$row['CAT_NUMBER']} </td> <td>{$row['TITLE']} </td> <td>{$row['CONSENT']} </td> 
		<td>{$row['LOCATION']} </td> <td>{$row['AUTUMN']} </td> <td>{$row['WINTER']} </td> <td>{$row['SPRING']} </td> <td>{$row['SUMMER']} </td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    ?>
    <br>  
    <h3>IS Standard: Open Elective</h3>
    <?php
    $queryO="SELECT CID, SUBJECT, CAT_NUMBER, TITLE, CONSENT, LOCATION, AUTUMN, WINTER, SPRING, SUMMER
	FROM IS_REQUIREMENTS_STD JOIN COURSES ON IS_REQUIREMENTS_STD.CID = COURSES.COURSE_ID WHERE REQUIREMENT = 'O'";
    $result= mysqli_query($conn, $queryO);
    echo "<table class='table' border = '1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>COURSE ID</th>";
	echo "<th scope='col'>SUBJECT</th>";
	echo "<th scope='col'>CATALOG NUMBER</th>";
	echo "<th scope='col'>TITLE</th>";
	echo "<th scope='col'>CONSENT</th>";
	echo "<th scope='col'>LOCATION</th>";
	echo "<th scope='col'>AUTUMN</th>";
	echo "<th scope='col'>WINTER</th>";
	echo "<th scope='col'>SPRING</th>";
	echo "<th scope='col'>SUMMER</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row=mysqli_fetch_assoc($result)) {
      echo "<tr><td>{$row['CID']}</td> <td>{$row['SUBJECT']} </td> <td>{$row['CAT_NUMBER']} </td> <td>{$row['TITLE']} </td> <td>{$row['CONSENT']} </td> 
		<td>{$row['LOCATION']} </td> <td>{$row['AUTUMN']} </td> <td>{$row['WINTER']} </td> <td>{$row['SPRING']} </td> <td>{$row['SUMMER']} </td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    ?>
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
  </body>
</html>
<?php require_once ("footer.php"); ?>
