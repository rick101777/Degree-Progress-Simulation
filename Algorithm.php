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
		 for ($i = 0; $i < count($adjacencyList->getAdjacencyList()); $i++){
     		print_r($adjacencyList->getAdjacencyList()[$i]);
     		echo "<br><br>";
     	}
		//var_dump($adjacencyList->getAdjacencyList()[0]->first);
		$Graph = new Graph($adjacencyList);
		$Graph->TopologicalSort();

	}



	class Graph{

		private $AdjacencyList;
		private $Count;

		public function __construct($AdjacencyList){
			$this->AdjacencyList = $AdjacencyList;
			$this->Count = count($AdjacencyList->getAdjacencyList());
		}


		public function TopologicalSort(){
			$Stack = new Stack();

			$Visited = array();
			for ($i = 0; $i < $this->Count; $i++){
				Array_push($Visited, 0);
			}

			for ($i = 0; $i < $this->Count; $i++){
				if ($Visited[$i] == 0){
					$this->TopologicalSortHelper($i, $Visited, $Stack);
				}
			}

			//print_r($Visited);
			//echo "<br>";
			$Numbered = 0;
			while(!$Stack->isEmpty()){
				echo "". $Numbered. ", ";
				$Node = $Stack->Pop();
				echo "". $Node->getCourseID(). ", ". $Node->getCategoryNumber() .", ". $Node->getTitle() .", ";
				echo "<br><br>";
				$Numbered++;
			}

		}

		public function Find($Node){
			for ($i = 0; $i < $this->Count; $i++){
				if ($Node->getCourseID() === $this->AdjacencyList->getAdjacencyList()[$i]->first->getCourseID()){
					return $i;
				}
			}
			return -1;
		}

		public function TopologicalSortHelper($Index, &$Visited, &$Stack){
			$Visited[$Index] = 1;


			$Node = $this->AdjacencyList->getAdjacencyList()[$Index]->first;
			echo "Previous Index: ". $Index . "\tValue: " . $Node->getTitle();
			echo "<br><br>";
			while (!is_null($Node->Next)){
				//echo "Origin: ". $Node->getCourseID(). ", Future: ". $Node->Next->getCourseID();
				//echo "<br><br>";
				$Node = $Node->Next;
				$nextIndex = &$this->Find($Node);

				if (!$Visited[$nextIndex]){
					echo "CourseID : ". $Node->getCourseID(0). ", Index: ". $nextIndex . ", ArrayValue: ". $this->AdjacencyList->getAdjacencyList()[$nextIndex]->first->getCourseID();
					echo "<br>";
					//print_r($Visited);
					//echo "<br><br>";
					$this->TopologicalSortHelper($nextIndex, $Visited, $Stack);
				}
			}
			$Stack->Push($Node);
		}

	}





?>
