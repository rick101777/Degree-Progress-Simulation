<!-- <h1 style="text-align: center;">Linked List Beta</h1> -->
<?php
	class LinkedList{
		public $first;
		private $Count;

		public function __construct(){
			$this->first = NULL;
			$this->Count = 0;
		}

		public function InsertFirst($Node){
			$temp = new Course();
			$temp->setCourseID($Node->getCourseID());
			$temp->setSubject($Node->getSubject());
			$temp->setCategoryNumber($Node->getCategoryNumber());
			$temp->setTitle($Node->getTitle());
			$temp->setSubjectDesc($Node->getSubjectDesc());
			$temp->setConsent($Node->getConsent());
			$temp->setLocation($Node->getLocation());
			$temp->setTermsOffered($Node->getTermsOfferedArray());
			$this->first = &$temp;
			$this->Count++;
		}


		public function Insert($Node){
			if (!is_null($this->first)){
				$temp = new Course();
				$temp->setCourseID($Node->getCourseID());
				$temp->setSubject($Node->getSubject());
				$temp->setCategoryNumber($Node->getCategoryNumber());
				$temp->setTitle($Node->getTitle());
				$temp->setSubjectDesc($Node->getSubjectDesc());
				$temp->setConsent($Node->getConsent());
				$temp->setLocation($Node->getLocation());
				$temp->setTermsOffered($Node->getTermsOfferedArray());
				$currentNode = $this->first;
				while ($currentNode->Next !== NULL){
					$currentNode = $currentNode->Next;
				}

				$currentNode->Next = $temp;
				$this->Count++;
			}
			else{
				$this->InsertFirst($Node);
			}
		}

		public function isEmpty(){
			return $this->first == NULL;
		}

		public function getCount(){
			return $this->Count;
		}

	}

?>
