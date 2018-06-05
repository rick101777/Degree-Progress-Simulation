<h1 style = "text-align: center;">Algorithm Beta</h1>
<?php
	include("AlgorithmAdjacencyList.php");
	include("AlgorithmStack.php");
	include("AlgorithmDataRetriver.php");
	include("AlgorithmLinkedList.php");
	

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
		$Graph->TopologicalSort();

	}



	class Graph{

		private $AdjacencyList;	// Adjacency List Object 
		private $Count; // Number of first nodes in the adjacency List

		public function __construct($AdjacencyList){
			$this->AdjacencyList = $AdjacencyList;
			$this->Count = count($AdjacencyList->getAdjacencyList());
		}


		public function TopologicalSort(){

			$Visited = array();
			$Stack = new Stack();


			for ($i = 0; $i < $this->Count; $i++){		// Sets all Nodes to not visited
				array_push($Visited, 0);
			}


			// Loops throught the first Adjacency Nodes
			for ($i = 0; $i < $this->Count; $i++){

				if ($Visited[$i] == 0){
					$this->TopologicalSortHelper($i, $Visited, $Stack);
				}
			}


			$Numbered = 0;
			while(!$Stack->isEmpty()){		// Writes the results out to the screen
				echo "". $Numbered. ", ";
				$Node = $Stack->Pop();
				echo "". $Node->getCourseID(). ", ". $Node->getCategoryNumber() .", ". $Node->getTitle() .", ";
				echo "<br><br>";
				$Numbered++;
			}

		}

		// Finds the Node's index within the adjacency List
		public function Find($Node){
			for ($i = 0; $i < $this->Count; $i++){
				if ($Node->getCourseID() === $this->AdjacencyList->getAdjacencyList()[$i]->first->getCourseID()){
					return $i;
				}
			}
			return -1;
		}

		// Helper function:
		// Goes through all the linked nodes, and finds the end of the Prerequisites 
		public function TopologicalSortHelper($Index, &$Visited, $Stack){
			$Visited[$Index] = 1;

			$Node = $this->AdjacencyList->getAdjacencyList()[$Index]->first;

			if ($Node->Next == null){
				$Stack->Push($Node);
			}
			else{
				while (!is_null($Node->Next)){
					$Node = $Node->Next;
					$Index = $this->Find($Node);
					if ($Visited[$Index] !== 1){
						$this->TopologicalSortHelper($Index, $Visited, $Stack);
					}
				}
			}


		}

	}





?>
