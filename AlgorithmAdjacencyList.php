<h1 style="text-align: center;"> Adjacency List Beta</h1>
<?php
// Utilizes an Array of Course Nodes, and the Linked List class to make a Adjacency List
	class AdjacencyList{

		private $AdjacencyList = array();

		public function __construct(){
		}

		// Handles searching through the Course Nodes, and searches by COURSE_ID;
		public function Search($CourseData, $StringCourseId){
			$n = count($CourseData);
			for ($i = 0; $i < $n; $i++){
				if ($CourseData[$i]->getCourseID() == intval($StringCourseId)){
					return $i;
				}
			}
			return -1;
		}

		// Handles the construction of the Adjacency List, by creating an array, which gets populated with
		// LinkedList objects full of Course Nodes, and their respective Prerequisite Connections.
		public function BuildAdjacencyList($CourseData){
			$DataSize = count($CourseData);
			if ($DataSize == 0){
				echo "Insuffcient Data to Work With.";
				return;
			}
			$AdjacencyList = array();
			for ($i = 0; $i < $DataSize; $i++){
				$Node = $CourseData[$i];
				$LinkedList = new LinkedList();
				$LinkedList->Insert($Node);
				$PrereqSize = count($Node->getANDPrereqArray());
				$NodePrereq = $Node->getANDPrereqArray();
				for ($j = 0; $j < $PrereqSize; $j++){
					$PrereqNodeIndex = $this->Search($CourseData, $NodePrereq[$j]);

					if ($PrereqNodeIndex != -1){
						$LinkedList->Insert($CourseData[intval($PrereqNodeIndex)]);
					}
				}
				array_push($this->AdjacencyList, $LinkedList);
			}
	
		}

		// Returns the array of LinkedLists created by the BuildAdjacencyList Function
		public function getAdjacencyList(){
			return $this->AdjacencyList;
		}

	}

?>