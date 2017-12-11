<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Mahasiswa</title>
</head>
<body>
  <table style="border-collapse: collapse;" border="1">
 <tbody>
  <tr style="background: grey;">
   <td>No. Induk</td>
   <td>Nama</td>
   <td>Alamat</td>
  </tr>
<?php foreach ($data as $mahasiswa) { ?>
  <tr>
  <td><?php echo $mahasiswa['no_induk']; ?> </td>
  <td><?php echo $mahasiswa['nama']; ?></td> 
   <td> <?php echo $mahasiswa['alamat']; ?> </td>
   <td> <a href="<?php echo base_url()."index.php/helloworld/edit_data/".$mahasiswa['no_induk']; ?>">Edit </td>
   <td> <a href="<?php echo base_url()."index.php/helloworld/delete_data/".$mahasiswa['no_induk']; ?>   ">Delete </td>
   </tr>
<?php } ?>
 </tbody>
</table>
<a href="<?php echo base_url()."index.php/helloworld/add_data";?>">Insert</a>
</body>
</html>