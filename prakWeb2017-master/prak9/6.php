<?php
class computer{
	private $jenis_processor="Intel Core i7-4790 3.6 Ghz";
	public function tampilkan_processor()
	{
		return $this->jenis_processor;
	}
}
class laptop extends computer{
	public function tampilkan_processor(){
		return $this->jenis_processor;
	}
}
$komputer_baru =new computer();
$laptop_anto =new laptop();
//set properti error
echo $komputer_baru->tampilkan_processor();
echo "<br/>";
echo $laptop_anto->tampilkan_processor();
echo "<br/>";
?>