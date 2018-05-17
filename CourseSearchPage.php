<h1 style = "text-align: center;">Algorithm Beta</h1>
<?php
	include "dbcontroller.php";

	// Node class for courses, with database table attributes.
	class Course{
		//Course Properties
		private $CourseID;
		private $Subject;
		private $Title;
		private $Location;
		private $Prereq = array();
		// Next Course, For LinkedList Use
		public $Next;

		public function __construct(){
			$this->Next = NULL;
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
	}

	class Stack{

		private $Stack = array();
		private $Count = 0;

		public function __construct(){

		}

		public function Push($Object){
			array_unshift($this->Stack, $Object);
		}

		public function Pop(){
			return array_shift($this->Stack);
		}

		public function isEmpty(){
			return $this->Count == 0;
		}

	}

	class LinkedList{
		private $root;
		private $count;

		public function __construct(){
			$this->root = NULL;
			$this->count = 0;
		}

		public function Insert($Node){
			if ($this->root == NULL){
				$this->root = $Node;
				$this->count++;
			}
			else{
				$current = $this->root;
				while($current->Next != NULL){
					$current = $current->Next;
				}
				$current->Next = $Node;
				$this->count++;
			}
		}

		public function isEmpty(){
			return $this->root == NULL;
		}

	}

	// Utilizes an Array of Course Nodes, and the Linked List class to make a Adjacency List
	class AdjacencyList{

		private $AdjacencyList = array();

		public function __construct(){
		}

		// Handles searching through the Course Nodes, and searches by COURSE_ID;
		public function BinarySearch($CourseData, $StringCourseId){
			$LowIndex = 0;
			$HighIndex = count($CourseData)-1;
			while ($LowIndex <= $HighIndex){
				$mid = (int)(($LowIndex+$HighIndex)/2);
				if (intval($StringCourseId) < intval($CourseData[$mid]->getCourseID())){
					$LowIndex = $mid + 1;
				}
				if (intval($StringCourseId) == intval($CourseData[$mid]->getCourseID())){
					return $mid;
				}else{
					$HighIndex = $mid -1;
				}
			}
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
				$PrereqSize = count($Node->getPrereqArray()) - 1;
				for ($j = 0; $j < $PrereqSize; $j++){
					$NodePrereq = $Node->getPrereqArray();
					$PrereqNodeIndex = $this->BinarySearch($CourseData, $Node->getPrereqArray()[$j]);

					$LinkedList->Insert($CourseData[intval($PrereqNodeIndex)]);
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
			$dbcontroller = new DBController();

			$result = $dbcontroller->runQuery("SELECT * FROM t_courses WHERE LOCATION = 'LOOP' AND CONSENT = 'N'");


			$NodeArray = array();
			for ($i = 0; $i < 12; $i++){
				$CourseID = $result[$i]['COURSE_ID'];
				$Subject = $result[$i]['SUBJECT'];
				$Title = $result[$i]['TITLE'];
				$Location = $result[$i]['LOCATION'];
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
				if ($RawNode->getCourseID() == 1488){
					$RawNode->addPrereq(1490);
					$RawNode->addPrereq(6380);
				}
				if ($RawNode->getCourseID() == 1485){
					$RawNode->addPrereq(1513);
				}
				if ($RawNode->getCourseID() == 1489){
					$RawNode->addPrereq(1490);
					$RawNode->addPrereq(1470);
				}
				if ($RawNode->getCourseID() == 6379){
					$RawNode->addPrereq(6384);
					$RawNode->addPrereq(1488);
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

		public function __construct($AdjacencyList){
			$this->AdjacencyList = $AdjacencyList;
		}


		public function TopologicalSort(){

		}

	}



	//$adjacencyList = new AdjacencyList();
	//$adjacencyList->BuildAdjacencyList();
	//print_r($adjacencyList->getAdjacencyList()[0]);


	$Stack = new Stack();

	$Stack->Push("Hello");
	$Stack->Push("Bye");
	$Stack->Push("Tie Die");

	$Result = $Stack->Pop();
	echo $Result;
	echo "<br><br>";
	$Result = $Stack->Pop();
	echo $Result;
	echo "<br><br>";
	$Result = $Stack->Pop();
	echo $Result;
	echo "<br><br>";

?>
