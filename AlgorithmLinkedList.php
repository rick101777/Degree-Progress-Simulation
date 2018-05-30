<h1 style="text-align: center;">Linked List Beta</h1>
<?php
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
			$NewNode->setCategoryNumber($Node->getCategoryNumber());
			$NewNode->setTitle($Node->getTitle());
			$NewNode->setConsent($Node->getConsent());
			$NewNode->setSubjectDesc($Node->getSubjectDesc());
			$NewNode->setLocation($Node->getLocation());
			$NewNode->Next = $this->first;
			$this->first = &$NewNode;
			$this->Count++;
		}


		public function Insert($Node){
			if ($this->first != Null){
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

?>