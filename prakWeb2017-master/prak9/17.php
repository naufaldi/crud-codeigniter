<?php
class komputer{
	public function lihat_spec(){
		return "Spec komputer : Acer, procesor Intel core i7, RAM 4Gb";
	}
}
class laptop extends komputer{
	public function lihat_spec()
	{
		return "Spec komputer : Asus, procesor Intel core i5, RAM 8Gb";
	}
	public function lihat_spec_komputer()
	{
		return parent::lihat_spec();
	}
}
$gadget_baru =new laptop();
//set properti
echo $gadget_baru->lihat_spec();
echo "<br/>";
echo $gadget_baru->lihat_spec_komputer();

?>