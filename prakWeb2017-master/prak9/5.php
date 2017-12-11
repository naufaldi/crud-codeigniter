<?php
class computer{
	protected $jenis_processor="Intel Core i7-4790 3.6 Ghz";
}
class laptop extends computer{
	public function tampilkan_processor(){
		return $this->jenis_processor;
	}
}

$laptop_anto =new laptop();
//set properti error
echo $laptop_anto->tampilkan_processor();
echo "<br/>";
?>