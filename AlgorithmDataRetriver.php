<!-- //<h1 style="text-align: center;">Data Retriver Beta</h1> -->
<?php
	include ("AlgorithmStudentPreferences.php");
	
	// Accesses the Database and Retrieves the data from it, and converts the course data to Course Nodes
	class CourseDataRetriver{

		private $Student;

		public function __construct($Student){
			$this->Student = $Student;
		}


		private function FetchANDPrereq($Course, &$CourseData){
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

		private function FetchORPrereq($Course, &$CourseData){
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

		private function QueryingRequirements(){
			$Major = $this->Student->getMajor();
			$Concentration = $this->Student->getConcentration();
			$PreferedLocation = $this->Student->getLocation();
			if ($PreferedLocation == "In-Person"){
				$PreferedLocation = "LOOP";
			}
			else {
				$PreferedLocation = "ONLINE";
			}

			$Query;
			if ($Major == "Computer Science"){
				$Query = "SELECT DISTINCT * FROM COURSES INNER JOIN CSC_REQUIREMENTS ON COURSES.COURSE_ID = CSC_REQUIREMENTS.CID WHERE COURSES.LOCATION = '$PreferedLocation' AND CSC_REQUIREMENTS.REQUIREMENT = 'R'"; 
			}
			if ($Major == "Information Systems"){
				if ($Concentration == "IS: Standard"){
					$Query = "SELECT DISTINCT * FROM COURSES INNER JOIN IS_REQUIREMENTS_STD ON COURSES.COURSE_ID = IS_REQUIREMENTS_STD.CID AND COURSES.LOCATION = '$PreferedLocation' AND IS_REQUIREMENTS_STD.REQUIREMENT = 'R'";
				}
				else if ($Concentration == "IS: Business Analysis/Systems Analysis"){
					$Query = "SELECT DISTINCT * FROM COURSES INNER JOIN IS_REQUIREMENTS_BASA ON COURSES.COURSE_ID = IS_REQUIREMENTS_BASA.CID AND COURSES.LOCATION = '$PreferedLocation' AND IS_REQUIREMENTS_BASA.REQUIREMENT = 'R'";
				}
				else if ($Concentration == "IS: Business Intelligence"){
					$Query = "SELECT DISTINCT * FROM COURSES INNER JOIN IS_REQUIREMENTS_BI ON COURSES.COURSE_ID = IS_REQUIREMENTS_BI.CID AND COURSES.LOCATION = '$PreferedLocation' AND IS_REQUIREMENTS_BI.REQUIREMENT = 'R'";
				}
				else if ($Concentration == "IS: Database Administration"){
					$Query = "SELECT DISTINCT * FROM COURSES INNER JOIN IS_REQUIREMENTS_DA ON COURSES.COURSE_ID = IS_REQUIREMENTS_DA.CID AND COURSES.LOCATION = '$PreferedLocation' AND IS_REQUIREMENTS_DA.REQUIREMENT = 'R'";
				}
				else if ($Concentration == "IS: IT Enterprise Management"){
					$Query = "SELECT DISTINCT * FROM COURSES INNER JOIN IS_REQUIREMENTS_IEM ON COURSES.COURSE_ID = IS_REQUIREMENTS_IEM.CID AND COURSES.LOCATION = '$PreferedLocation' AND IS_REQUIREMENTS_IEM.REQUIREMENT = 'R'";
				}
			}
			return $Query;

		}


		// Handles fetching the data from the database, and constructs an array of course nodes.
		private function FetchCourses($Query){
			include("AlgorithmCourseNode.php");
			include("includes/dbh.inc.php");


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

				$this->FetchANDPrereq($Node, $NodeArray);
				$this->FetchORPrereq($Node, $NodeArray);

				Array_push($NodeArray, $Node);
			}

			return $NodeArray;
		}


		public function Run(){
			$Query = $this->QueryingRequirements();
			$Result = $this->FetchCourses($Query);
			return $Result;

		}

		// Outputs the course data for human consumption
		// Makes the data readable
		public function toString($data){

			echo "<br>";
			for ($i = 0; $i < count($data); $i++){
				$RawNode = $data[$i];
				echo "". $RawNode->getCourseID().", ". $RawNode->getCategoryNumber(). ", ".$RawNode->getSubject().", ".$RawNode->getTitle().",". $RawNode->getSubjectDesc(). "," .$RawNode->getLocation().",";
				print_r($RawNode->getANDPrereqArray());
				echo ", ";
				print_r($RawNode->getORPrereqArray());
				echo "<br><br>";
			}
		}
	}
?>
