<?php
include "Form.php";
echo "<html><head><tittle>Mahasiswa</tittle></head><body>";
$form = new Form("","Input Form");
$form->addField("txtnim","NIM");
$form->addField("txtnam","Nama");
$form->addField("txtalamat","Alamat");
echo "<h3>Silahkan Isi form berikut ini:</h3>";
$form->displayForm();
echo "</body></html>";

?>