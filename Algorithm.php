<h1 style = "text-align: center;">Algorithm Beta</h1>
<?php
	// Node class for courses, with database table attributes.
	class Course{
		//Course Properties
		private $CourseID;
		private $Subject;
		private $Title;
		private $Location;
		private $Prereq = array();
		// Next Course, For LinkedList Use
		public $Next = NULL;

		public function __construct(){
		}

/*------------------------------Setter Methods--------------------------------------------------------------*/
		public function setCourseID($InputCourseID){
			$this->CourseID = $InputCourseID;
		}
		public function setSubject($CourseSubject){
			$this->Subject = $CourseSubject;
		}
		public function setTitle($CourseTitle){
			$this->Title = $CourseTitle;
		}
		public function setDesc($CourseDesc){
			$this->SubjectDesc = $CourseDesc;
		}
		public function setLocation($CourseLocation){
			$this->Location = $CourseLocation;
		}
		public function addPrereq($CoursePrereq){
			array_push($this->Prereq, $CoursePrereq);
		}
/*------------------------------Getter Methods--------------------------------------------------------------*/
		public function getCourseID(){
			return $this->CourseID;
		}
		public function getSubject(){
			return $this->Subject;
		}
		public function getTitle(){
			return $this->Title;
		}
		public function getDesc(){
			return $this->SubjectDesc;
		}	
		public function getLocation(){
			return $this->Location;
		}
		public function getPrereqArray(){
			return $this->Prereq;
		}
		public function getNext(){
			return $this->Next;
		}
	}

	class Stack{

		private $Stack = array();
		private $Count = 0;

		public function __construct(){

		}

		public function Push($Object){
			array_unshift($this->Stack, $Object);
			$this->Count++;
		}

		public function Pop(){
			$this->Count--;
			return array_pop($this->Stack);
		}

		public function isEmpty(){
			return $this->Count == 0;
		}

	}

	class LinkedList{
		public $first;
		private $Count;

		public function __construct(){
			$this->first = NULL;
			$this->Count = 0;
		}

		public function InsertFirst($Node){
			$NewNode = new Course();
			$NewNode->setCourseID($Node->getCourseID());
			$NewNode->setSubject($Node->getSubject());
			$NewNode->setTitle($Node->getTitle());
			$NewNode->setLocation($Node->getLocation());
			$NewNode->Next = $this->first;
			$this->first = &$NewNode;
			$this->Count++;
		}


		public function Insert($Node){
			if ($this->first != Null){
				$NewNode = new Course();
				$NewNode->setCourseID($Node->getCourseID());
				$NewNode->setSubject($Node->getSubject());
				$NewNode->setTitle($Node->getTitle());
				$NewNode->setLocation($Node->getLocation());
				$this->first->Next = &$Node;
				$this->Count++;
			}
			else{
				$this->InsertFirst($Node);
			}
		}

		public function isEmpty(){
			return $this->first == NULL;
		}

	}

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
		public function BuildAdjacencyList(){
			$DataRetriver = new CourseDataRetriver();
			$CourseData = $DataRetriver->Fetch();
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
				$PrereqSize = count($Node->getPrereqArray());
				$NodePrereq = $Node->getPrereqArray();
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

	// Accesses the Database and Retrieves the data from it, and converts the course data to Course Nodes
	class CourseDataRetriver{

		public function __construct(){

		}
		// Handles fetching the data from the database, and constructs an array of course nodes.
		public function Fetch(){
			include ('includes/dbh.inc.php');
			$result = mysqli_query($conn, "SELECT * FROM t_courses WHERE LOCATION = 'LOOP' AND CONSENT = 'N'");
			$row = mysqli_fetch_all($result);
			//print_r($row);
			//$size = count($row);
			$NodeArray = array();
			for ($i = 0; $i < 6; $i++){
				$AccessedRow = $row[$i];
				$CourseID = $AccessedRow[0];
				$Subject = $AccessedRow[1];
				$Title = $AccessedRow[3];
				$Location = $AccessedRow[6];
				$Node = new Course();
				$Node->setCourseID($CourseID);
				$Node->setSubject($Subject);
				$Node->setTitle($Title);
				$Node->setLocation($Location);
				Array_push($NodeArray, $Node);
			}

			// Adds Prereq Information Since the database does not have that info yet.
			for ($i = 0; $i < count($NodeArray); $i++){
				$RawNode = $NodeArray[$i];
				if ($RawNode->getCourseID() == 1469){
					$RawNode->addPrereq(1490);
				}
				if ($RawNode->getCourseID() == 1470){
					$RawNode->addPrereq(1488);
					$RawNode->addPrereq(1489);

				}
				if ($RawNode->getCourseID() == 1485){
					$RawNode->addPrereq(1470);
				}
				if ($RawNode->getCourseID() == 1488){
					$RawNode->addPrereq(1485);
					$RawNode->addPrereq(1470);
				}
				if ($RawNode->getCourseID() == 1489){

				}
				if ($RawNode->getCourseID() == 1490){
					$RawNode->addPrereq(1485);
				}
			}
			return $NodeArray;
		}

		// Outputs the course data for human consumption
		// Makes the data readable
		public function toString($data){
			for ($i = 0; $i < count($data); $i++){
				$RawNode = $data[$i];
				echo "". $RawNode->getCourseID().", ".$RawNode->getSubject().", ".$RawNode->getTitle().", ".$RawNode->getLocation().", "; 
				print_r($RawNode->getPrereqArray());
				echo "<br><br>";
			}
		}

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


	//$CourseDataRetriver = new CourseDataRetriver();
	//$Data = $CourseDataRetriver->Fetch();
	//$CourseDataRetriver->toString($Data);
	$adjacencyList = new AdjacencyList();
	$adjacencyList->BuildAdjacencyList();
    //print_r($adjacencyList->getAdjacencyList()[4]);
	//var_dump($adjacencyList->getAdjacencyList()[0]->first);
	$Graph = new Graph($adjacencyList);
	$Graph->TopologicalSort();


?>
