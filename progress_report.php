<?php
$title = "Degree Progress Report";
require_once ("header.php");
include("Algorithm.php");
?>

<html lang="en">

    <head>
        <link rel="stylesheet" href="css/report.css">
    </head>
    
    <body>
        <div class="title-bar">
            <h1>Degree Progress Report
        </div>

        <div class="space"></div>

            <?php
            if (isset($_POST['submit'])){

                $Student = new Student();
                if (count($_POST) == 0){
                    include("includes/dbh.inc.php");
                    $StudentID = $_SESSION['s_id'];

                    $Query = "SELECT * FROM SAVED_SIMULATIONS WHERE SID = $StudentID";

                    $Result = mysqli_query($conn, $Query);
                    $row = mysqli_fetch_all($Result);
                    $size = count($row);
                    for ($i = 0; $i < $size; $i++){
                        echo $row[$i];
                    }
                    $Student->setMajor();
                    $Student->setConcentration($Concentration);
                    $Student->setQuantity($Quantity);
                    $Student->setLocation($Location);
                    
                }else{

    		        $Major = $_POST['Major'];
    		        $Concentration = $_POST['Concentration'];
    		        $Quantity = $_POST['Quantity'];
    		        $Location = $_POST['Location'];

                    $NumberQuantity = intval($Quantity);
                    include("includes/dbh.inc.php");
                    $StudentID = intval($_SESSION['s_id']);
                    $Query1 = "DELETE FROM SAVED_SIMULATIONS WHERE SID = $StudentID";
                    $Query2 = "INSERT INTO SAVED_SIMULATIONS (`SID`, `MAJOR`, `CONCENTRATION`, `QUANTITY`, `LOCATION`) VALUES ($StudentID, '$Major', '$Concentration', $NumberQuantity, '$Location')";

                    $Result = mysqli_query($conn, $Query1);
                    $Result2 = mysqli_query($conn, $Query2);

                    $Student = new Student();
                    $Student->setMajor($Major);
                    $Student->setConcentration($Concentration);
                    $Student->setQuantity($Quantity);
                    $Student->setLocation($Location); 
                
                }
        
                $Retrieves = new CourseDataRetriver($Student);
        		$Data = $Retrieves->Run();
                $adjacencyList = new AdjacencyList();
      		    $adjacencyList->BuildAdjacencyList($Data);
                $Graph = new Graph($adjacencyList);
        		$OutputStack = $Graph->TopologicalSort();


                
                $Numbered = 0;
                echo "<table class=\"table\">";
                echo "<tr>";
			    while(!$OutputStack->isEmpty()){		// Writes the results out to the screen in a table format

                    if ($Numbered > 0 and $Numbered % $Student->getQuantity()  == 0) {
                        echo "</tr>";
                        echo "<tr>";
                        $Numbered = 0;
                    }                
				    //echo "<td>". $Numbered. ", </td>";
				    $Node = $OutputStack->Pop();
				    //echo "<td><p class=\"course-item\">". $Node->getCourseID() . "</p></td>";
                    //echo "<td><p class=\"course-item\">". $Node->getCategoryNumber() . "</p></td>";
                    echo "<td><p class=\"course-item\">". $Node->getTitle() ."</p></td>";
				    //echo "<br><br>";
    
                    
                    $Numbered++;
                
               }
               echo "</tr>";
               echo "</table>";

            }
              ?>            
            
        <button type="submit" onclick = "/SavedProgressReport.php" class="btn btn-secondary" name="submit">Save Report</button>
    </body>
    
</html>    

<?php require_once ("footer.php"); ?>
