<h1 style="text-align: center;">Data Retriver Beta</h1>
<?php
	include ("AlgorithmStudentPreferences.php");
	
	// Accesses the Database and Retrieves the data from it, and converts the course data to Course Nodes
	class CourseDataRetriver{

		private $Student;

		public function __construct($Student){
			$this->Student = $Student;
		}


		private function FetchANDPrereq($Course){
			include("includes/dbh.inc.php");
			$CourseID = $Course->getCourseID();
			$Query = "SELECT PREREQ_ID FROM PREREQ_AND WHERE COURSE_ID = $CourseID";
			$result = mysqli_query($conn, $Query);
			$row = mysqli_fetch_all($result);
			$Size = count($row);
			if ($Size > 0){
				for ($i = 0; $i < $Size; $i++){
					$Course->addANDPrereq($row[$i][0]);
				}
			}
		}

		private function FetchORPrereq($Course){
			include("includes/dbh.inc.php");
			$CourseID = $Course->getCourseID();
			$Query = "SELECT PREREQ_ID FROM PREREQ_OR WHERE COURSE_ID = $CourseID";
			$result = mysqli_query($conn, $Query);
			$row = mysqli_fetch_all($result);
			$Size = count($row);
			if ($Size > 0){
				for ($i = 0; $i < $Size; $i++){
					$Course->addORPrereq($row[$i][0]);
				}
			}

		}


		// Handles fetching the data from the database, and constructs an array of course nodes.
		private function FetchCourses(){
			include("AlgorithmCourseNode.php");
			include("includes/dbh.inc.php");

			$Major = $this->Student->getMajor();
			$PreferedLocation = $this->Student->getLocation();

			if ($PreferedLocation != "Online"){
				$Query = "SELECT * FROM COURSES WHERE SUBJECT_DESC = '$Major' AND LOCATION != 'ONLINE' AND CONSENT = 'N'"; 
			}else{
				$Query = "SELECT * FROM COURSES WHERE SUBJECT_DESC = '$Major' AND LOCATION = 'ONLINE' AND CONSENT = 'N'";
			}

			$result = mysqli_query($conn, $Query);
			$row = mysqli_fetch_all($result);
			//print_r($row[0]);
			//echo "<br><br>";
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
				$TermsOffered = $Node->getTermsOfferedArray();
				$TermsOffered["Autumn"] = $AccessedRow[8];
				$TermsOffered["Winter"] = $AccessedRow[9];
				$TermsOffered["Spring"] = $AccessedRow[10];
				$TermsOffered["Summer"] = $AccessedRow[11];
				$Node->setTermsOffered($TermsOffered);

				$this->FetchANDPrereq($Node);
				$this->FetchORPrereq($Node);


				Array_push($NodeArray, $Node);
			}

			return $NodeArray;
		}


		public function Run(){
			$Result = $this->FetchCourses();
			return $Result;

		}

		// Outputs the course data for human consumption
		// Makes the data readable
		public function toString($data){

			echo "<br>";
			for ($i = 0; $i < count($data); $i++){
				$RawNode = $data[$i];
				echo "". $RawNode->getCourseID().", ". $RawNode->getCategoryNumber(). ", ".$RawNode->getSubject().", ".$RawNode->getTitle().", ". $RawNode->getConsent(). ",". $RawNode->getSubjectDesc(). "," .$RawNode->getLocation().", "; 
				print_r($RawNode->getTermsOfferedArray());
				echo ", \t";
				print_r($RawNode->getANDPrereqArray());
				echo ", \t";
				print_r($RawNode->getORPrereqArray());

				echo "<br><br>";
			}
		}
	}
?>