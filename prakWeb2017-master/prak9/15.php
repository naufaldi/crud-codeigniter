<?php
class komputer{
	protected function beli_komputer(){
		return "Beli Komputer Baru";
	}
}
class laptop extends komputer{
	protected function beli_laptop()
	{
		return "Beli Komputer Baru";
	}
}
class cromebook extends laptop{
	protected function beli_cromebook()
	{
		return "Beli cromebook Baru";
	}
	public function beli_semua()
	{
		$a= $this->beli_komputer();
		$b= $this->beli_laptop();
		$c= $this->beli_cromebook();
		return "$a<br/>$b<br/>$c";
	}
}
$gadget_baru =new cromebook();
//set properti
echo $gadget_baru->beli_semua();
echo "<br/>";
echo $gadget_baru->beli_komputer();

?>