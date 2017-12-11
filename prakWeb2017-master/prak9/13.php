<?php
class laptop{
	private $pemilik;
	private $merk;
	
	public function __construct($pemilik,$merk){
		$this->pemilik=$pemilik;
		$this->merk=$merk;
	}
	public function hidupkan_laptop(){
		return "Hidupkan Laptop $this->merk punya $this->pemilik";
	}
}
$laptop_andi =new laptop("Andi","Lenovo");
//set properti
//tampilkan method
echo "<br/>";
echo $laptop_andi->hidupkan_laptop();
echo "<br/>";
$laptop_anto =new laptop("Anto","Acer");
echo $laptop_anto->hidupkan_laptop();


?>