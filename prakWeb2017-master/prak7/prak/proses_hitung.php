<?php
$bil1 = $_GET['bil1'];
$bil2 = $_GET['bil2'];
$jumlah = $bil1+$bil2;
$pengurangan = $bil1-$bil2;
$kali = $bil1*$bil2;
$bagi = $bil1/$bil2;

echo "Bilangan 1 = ".$bil1."<br>";
echo "Bilangan 2 = ".$bil2."<br>";
echo "Bilangan 1 + Bilangan 2 = ".$jumlah."<br>";
echo "Bilangan 1 - Bilangan 2 = ".$pengurangan."<br>";
echo "Bilangan 1 * Bilangan 2 = ".$kali."<br>";
echo "Bilangan 1 / Bilangan 2 = ".$bagi."<br>";
?>