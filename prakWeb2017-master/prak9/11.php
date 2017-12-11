<?php
class laptop{
	private $pemilik="Andi";
	private $merk="Lenovo";
	
	public function __construct(){
		echo "Ini berasal dari construct Laptop";
	}
	public function hidupkan_laptop(){
		return "Hidupkan Laptop $this->merk punya $this->pemilik";
	}
	public function __destruct(){
		echo "Ini berasal dari Destruct Laptop";
	}

}
$laptop_anto =new laptop();
//set properti
//tampilkan method
echo "<br/>";
echo $laptop_anto->hidupkan_laptop();
echo "<br/>";
?>