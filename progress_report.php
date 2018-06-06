<?php
$title = "Degree Progress Report";
require_once ("header.php");
include("Algorithm.php");
?>

<?php
class Terms {

    private $term;
    
    public function __construct() {
        $this->term = "Summer";
    }

    public function getNextTerm() {
        if ($this->term === "Autumn") {
            $this->term = "Winter";
        }
        elseif ($this->term === "Winter") {
            $this->term = "Spring";
        }
        elseif ($this->term === "Spring") {
            $this->term = "Summer";
        }
        elseif ($this->term === "Summer") {
            $this->term = "Autumn";
        }
        return $this->term;
    }
    
}
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

                $majorElectives;
                $openElectives;

                if ($Student->getMajor() == "Computer Science") {
                    $majorElectives = 4;
                    $openElectives = 4;
                }
                if ($Student->getMajor() === "Information Systems") {
                    if ($Student->getConcentration() === "IS: Standard") {
                        $majorElectives = 7;
                       $openElectives = 1;
                    }
                    elseif ($Student->getConcentration() === "IS: Business Analysis/Systems Analysis") {
                        $majorElectives = 2;
                        $openElectives = 1;
                    }
                    elseif ($Student->getConcentration() === "IS: Business Intelligence") {
                        $majorElectives = 3;
                        $openElectives = 1;
                    }
                    elseif ($Student->getConcentration() === "IS: Database Administration") {
                        $majorElectives = 3;
                        $openElectives = 1;
                    }
                    elseif ($Student->getConcentration() === "IS: IT Enterprise Management") {
                        $majorElectives = 3;
                        $openElectives = 1;
                    }
                }

                $Numbered = 0;
                $termObject = new Terms();
$term = $termObject->getNextTerm();
                echo "<table class=\"table\">";
                echo "<tr>";
			    while(!$OutputStack->isEmpty() || $majorElectives > 0 || $openElectives > 0){		// Writes the results out to the screen in a table format

                    if ($Numbered > 0 and $Numbered % $Student->getQuantity()  == 0) {
$term = $termObject->getNextTerm();
                        echo "</tr>";
                        echo "<tr>";
                        $Numbered = 0;
                    }                
                    if (!$OutputStack->isEmpty()) {
				        $Node = $OutputStack->Pop();

                    if ($Numbered == 0) {
                        if ($Node->getTermsOfferedArray()[$term] === "Y") {
                            echo "<td><h2>" . $term . "</h2><p class=\"course-item\">". $Node->getTitle() ."</p></td>";
                        }
                    }
                    else {
                        if ($Node->getTermsOfferedArray()[$term] === "Y") {
                            echo "<td><h2>----</h2><p class=\"course-item\">". $Node->getTitle() ."</p></td>";
                        }
                    }
}
                    else {
if ($majorElectives > 0) {
if ($Numbered == 0) {
echo "<td><h2>" . $term . "</h2><p class=\"course-item\">". "Major Elective" ."</p></td>";
}
else {
echo "<td><h2>----</h2><p class=\"course-item\">". "Open Elective" ."</p></td>";
}
$majorElectives--;
}
else if ($openElectives > 0) {
if ($Numbered == 0) {
echo "<td><h2>" . $term . "</h2><p class=\"course-item\">". "Major Elective" ."</p></td>";
}
else {
echo "<td><h2>----</h2><p class=\"course-item\">". "Open Elective" ."</p></td>";
}
$openElectives--;
}
                    } 

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
