<!-- <h1 style = "text-align: center;">Algorithm Beta</h1> -->
<link rel="stylesheet" href="css/report.css">
<?php
	include("AlgorithmAdjacencyList.php");
	include("AlgorithmStack.php");
	include("AlgorithmDataRetriver.php");
	include("AlgorithmLinkedList.php");
	
/*
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
*/


	class Graph{

		private $AdjacencyList;	// Adjacency List Object 
		private $Count; // Number of first nodes in the adjacency List

		public function __construct($AdjacencyList){
			$this->AdjacencyList = $AdjacencyList;
			$this->Count = count($AdjacencyList->getAdjacencyList());
		}


		public function TopologicalSort(){

			$Visited = array();
			$OutputStack = new Stack();

			// Sets all Nodes to not visited
			for ($i = 0; $i < $this->Count; $i++){
				array_push($Visited, 0);
			}

			// Finds all the Nodes who have no prereqs and adds them to the output
			for ($i = 0; $i < $this->Count; $i++){
				if ($this->AdjacencyList->getAdjacencyList()[$i]->getCount() == 1){
					$OutputStack->Push($this->AdjacencyList->getAdjacencyList()[$i]->first);
				}
			}

			$TracedRouteStack = new Stack();
			for ($j = 0; $j < $this->Count; $j++){
				$Node = $this->AdjacencyList->getAdjacencyList()[$j]->first;
				$TracedRouteStack->Push($this->Find($Node));
				while ($Node->Next != NULL){
					$Node = $Node->Next;
					$TracedRouteStack->Push($this->Find($Node));
				}
			}

			$BackTraceRouteStack = new Stack();
			while (!$TracedRouteStack->isEmpty()){
				$Node = $this->AdjacencyList->getAdjacencyList()[$TracedRouteStack->Pop()]->first;
				if ($Node->Next == NULL){
					$OutputStack->Push($Node);
					while (!$BackTraceRouteStack->isEmpty()){
						$BackRouteNode = $this->AdjacencyList->getAdjacencyList()[$BackTraceRouteStack->Pop()]->first;
						$OutputStack->Push($BackRouteNode);
					}
				}
				if ($Node->Next != null){
					$BackTraceRouteStack->Unshift($this->Find($Node));
				}
			}            
			return $OutputStack;
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


	}





?>
