<?php
class laptop{
	protected $pemilik;
	
	public function hidupkan_laptop(){
		return "Hidupkan Laptop";
	}

}
$laptop_anto =new laptop();
//set properti error
$laptop_anto->pemilik="Anto";

//tampil properti
echo $laptop_anto->pemilik;
echo "<br/>";

//tampilkan method
echo $laptop_anto->hidupkan_laptop();
?>