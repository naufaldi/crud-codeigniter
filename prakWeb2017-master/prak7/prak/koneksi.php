<?php
$db_host='localhost';
$db_usn='root';
$db_pwd='';
$db_name='sekolah';

$db_link =mysqli_connect($db_host,$db_usn,$db_pwd,$db_name);
if(!$db_link){
	echo "tidak terhubung database";
}
?>