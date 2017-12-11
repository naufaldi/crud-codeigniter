<?php
class komputer{
	public $processor;
	public $merk;
	public $memory;
	function beli_komputer(){
		return "Beli Komputer Baru";
	}
}
class laptop extends komputer{
	public function lihat_spec()
	{
		return "Merk : $this->merk, processor : $this->processor, memory : $this->memory";
	}
}
$laptop_anto =new laptop();
//set properti
$laptop_anto->processor="intel core i5";
$laptop_anto->merk="Acer";
$laptop_anto->memory="2 Ghz";

//tampil properti
echo $laptop_anto->beli_komputer();
echo "<br/>";
echo $laptop_anto->lihat_spec();

?>