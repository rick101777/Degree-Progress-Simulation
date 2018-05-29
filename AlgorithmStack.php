<h1 style="text-align: center;"> Stack Beta</h1>
<?php
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
?>