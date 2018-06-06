<!-- <h1 style="text-align: center;"> Course Node Beta</h1> -->
<?php
	// Node class for courses, with database table attributes.
	class Course{
			//Course Properties
			private $CourseID;
			private $Subject;
			private $CategoryNumber;
			private $Title;
			private $Consent;
			private $SubjectDesc;
			private $Location;
			private $TermsOffered = array("Autumn" => "N", "Winter" => "N", "Spring" => "N", "Summer" => "N");
			private $ANDPrereq = array();
			private $ORPrereq = array();

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
			public function setCategoryNumber($CategoryNumber){
				$this->CategoryNumber = $CategoryNumber;
			}
			public function setTitle($CourseTitle){
				$this->Title = $CourseTitle;
			}
			public function setConsent($Consent){
				$this->Consent = $Consent;
			}
			public function setSubjectDesc($CourseDesc){
				$this->SubjectDesc = $CourseDesc;
			}
			public function setLocation($CourseLocation){
				$this->Location = $CourseLocation;
			}
			public function setTermsOffered($TermsOffered){
				$this->TermsOffered = $TermsOffered;
			}
			public function addANDPrereq($CoursePrereq){
				array_push($this->ANDPrereq, $CoursePrereq);
			}
			public function addORPrereq($CoursePrereq){
				array_push($this->ORPrereq, $CoursePrereq);
			}
/*------------------------------Getter Methods--------------------------------------------------------------*/
			public function getCourseID(){
				return $this->CourseID;
			}
			public function getSubject(){
				return $this->Subject;
			}
			public function getCategoryNumber(){
				return $this->CategoryNumber;
			}
			public function getTitle(){
				return $this->Title;
			}
			public function getConsent(){
				return $this->Consent;
			}
			public function getSubjectDesc(){
				return $this->SubjectDesc;
			}	
			public function getLocation(){
				return $this->Location;
			}
			public function getTermsOfferedArray(){
				return $this->TermsOffered;
			}
			public function getANDPrereqArray(){
				return $this->ANDPrereq;
			}
			public function getORPrereqArray(){
				return $this->ORPrereq;
			}
			public function getNext(){
				return $this->Next;
			}

		}

?>
