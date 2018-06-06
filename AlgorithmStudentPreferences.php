<!-- <h1 style="text-align: center;">Student Preferences Beta</h1> -->
<?php


	class Student{

		private $Major;
		private $Concentration;
		private $Quantity;
		private $Location;

		public function __construct(){

		}
/*------------------------Getters---------------------------------*/

		public function setMajor($Major){
			$this->Major = $Major;
		}
		public function setConcentration($Concentration){
			$this->Concentration = $Concentration;
		}
		public function setQuantity($Quantity){
			$this->Quantity = $Quantity;
		}
		public function setLocation($Location){
			$this->Location = $Location;
		}
/*-------------------------Setters---------------------------------*/
		public function getMajor(){
			return $this->Major;
		}
		public function getConcentration(){
			return $this->Concentration;
		}
		public function getQuantity(){
			return $this->Quantity;
		}
		public function getLocation(){
			return $this->Location;
		}



	}



?>
