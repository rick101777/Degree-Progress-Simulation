<h1 style = "text-align: center;">Algorithm Beta</h1>
<?php
	include("AlgorithmAdjacencyList.php");
	include("AlgorithmStack.php");
	include("AlgorithmCourseNode.php");
	include("AlgorithmDataRetriver.php");
	include("AlgorithmLinkedList.php");

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

			print_r($Visited);
			echo "<br>";
			$Numbered = 0;
			while(!$Stack->isEmpty()){
				echo "". $Numbered. ", ";
				print_r($Stack->Pop());
				echo "<br><br>";
				$Numbered++;
			}

		}

		public function Find($Node){
			for ($i = 0; $i < $this->Count; $i++){
				if ($Node->getCourseID() == $this->AdjacencyList->getAdjacencyList()[$i]->first->getCourseID()){
					return $i;
				}
			}
			return -1;
		}

		public function TopologicalSortHelper($Index, &$Visited, $Stack){
			$Visited[$Index] = 1;


			$Node = $this->AdjacencyList->getAdjacencyList()[$Index]->first;
			$Stack->Push($Node);
			while ($Node->Next != NULL){
				echo "Origin: ". $Node->getCourseID(). ", Future: ". $Node->Next->getCourseID();
				echo "<br><br>";
				$Node = $Node->Next;
				$nextIndex = $this->Find($Node);
				if ($Visited[$nextIndex] == 0){
					//echo "CourseID : ". $Node->getCourseID(0). ", Index: ". $nextIndex . ", ArrayValue: ". $this->AdjacencyList->getAdjacencyList()[$nextIndex]->first->getCourseID();
					//echo "<br>";
					print_r($Visited);
					echo "<br><br>";
					$this->TopologicalSortHelper($nextIndex, $Visited, $Stack);
				}
			}

		}

	}


	$CourseDataRetriver = new CourseDataRetriver();
	$Data = $CourseDataRetriver->FetchCourses();
	$CourseDataRetriver->toString($Data);
	//$adjacencyList = new AdjacencyList();
	//$adjacencyList->BuildAdjacencyList();
    //print_r($adjacencyList->getAdjacencyList()[4]);
	//var_dump($adjacencyList->getAdjacencyList()[0]->first);
	//$Graph = new Graph($adjacencyList);
	//$Graph->TopologicalSort();


?>
