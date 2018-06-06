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

		        $Major = $_POST['Major'];
		        $Concentration = $_POST['Concentration'];
		        $Quantity = $_POST['Quantity'];
		        $Location = $_POST['Location'];
        
        		$Student = new Student();
        		$Student->setMajor($Major);
        		$Student->setConcentration($Concentration);
        		$Student->setQuantity($Quantity);
        		$Student->setLocation($Location);
        
        		//print_r($Student);
        
                $Retrieves = new CourseDataRetriver($Student);
        		$Data = $Retrieves->Run();
        		//$Retrieves->toString($Data); 
                $adjacencyList = new AdjacencyList();
      		    $adjacencyList->BuildAdjacencyList($Data);
        		 //for ($i = 0; $i < count($adjacencyList->getAdjacencyList()); $i++){
             	//	print_r($adjacencyList->getAdjacencyList()[$i]);
             	//	echo "<br><br>";
             	//}
        		//var_dump($adjacencyList->getAdjacencyList()[0]->first);
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
            
        <button type="submit" class="btn btn-secondary" name="submit">Save Report</button>
    </body>
    
</html>    

<?php require_once ("footer.php"); ?>
