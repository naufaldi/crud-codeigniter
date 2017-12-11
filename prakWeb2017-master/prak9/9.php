<?php
class laptop{
	private $pemilik="Anto";
	private $merk="Acer";
	
	public function hidupkan_laptop($pemilik,$merk){
		return "Hidupkan Laptop $merk punya $pemilik";
	}
	public function hidupkan_laptop_anto(){
		return "Hidupkan Laptop $this->merk punya $this->pemilik";
	}

}
$laptop_anto =new laptop();
//set properti
//tampilkan method
echo $laptop_anto->hidupkan_laptop("Andi","Lenovo");
echo "<br/>";
echo $laptop_anto->hidupkan_laptop_anto();
?>