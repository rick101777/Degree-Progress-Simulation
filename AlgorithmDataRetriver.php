<h1 style="text-align: center;">Data Retriver Beta</h1>
<?php

	// Accesses the Database and Retrieves the data from it, and converts the course data to Course Nodes
	class CourseDataRetriver{

		public function __construct(){

		}


		public function FetchANDPrereq($CourseID){

		}

		public function FetchORPrereq($CourseID){
			include ('includes/dbh.inc.php');



		}


		// Handles fetching the data from the database, and constructs an array of course nodes.
		public function FetchCourses(){
			include ('includes/dbh.inc.php');
			$result = mysqli_query($conn, "SELECT * FROM COURSES WHERE LOCATION = 'LOOP' AND CONSENT = 'N'");
			$row = mysqli_fetch_all($result);
			print_r($row[0]);
			echo "<br><br>";
			$size = count($row);
			$NodeArray = array();
			for ($i = 0; $i < $size; $i++){
				$AccessedRow = $row[$i];
				$CourseID = intval($AccessedRow[0]);
				$Subject = $AccessedRow[1];
				$CategoryNumber = $AccessedRow[2];
				$Title = $AccessedRow[3];
				$Consent = $AccessedRow[4];
				$SubjectDesc = $AccessedRow[5];
				$Location = $AccessedRow[6];
				$Node = new Course();
				$Node->setCourseID($CourseID);
				$Node->setCategoryNumber($CategoryNumber);
				$Node->setSubject($Subject);
				$Node->setTitle($Title);
				$Node->setConsent($Consent);
				$Node->setSubjectDesc($SubjectDesc);
				$Node->setLocation($Location);

				Array_push($NodeArray, $Node);
			}

			mysqli_close($conn);
			return $NodeArray;
		}


		public function Run(){

		}

		// Outputs the course data for human consumption
		// Makes the data readable
		public function toString($data){
			for ($i = 0; $i < count($data); $i++){
				$RawNode = $data[$i];
				echo "". $RawNode->getCourseID().", ". $RawNode->getCategoryNumber(). ", ".$RawNode->getSubject().", ".$RawNode->getTitle().", ". $RawNode->getConsent(). ",". $RawNode->getSubjectDesc(). "," .$RawNode->getLocation().", "; 
				print_r($RawNode->getANDPrereqArray());
				echo "<br><br>";
			}
		}

	}
?>