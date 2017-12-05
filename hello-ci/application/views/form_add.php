<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Add </title>
</head>
<body>
<table>
    <form action="<?php echo base_url(). "index.php/helloworld/insert"; ?>" method="post" >
    <tr>
        <td> Nomor Induk</td>
        <td>: </td>
        <td> <input type="text" name="ni" placeholder="Masukkan Nomor Induk"> </td>
    </tr>
    <tr>
        <td> Nama</td>
        <td>:</td>
        <td><input type="text" name="nama" placeholder="Masukkan Nama Anda"></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><textarea style="resize:none;" name="alamat" ></textarea></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td> <input type="submit" name="submit" value="Simpan"></td>
    </tr>
    </form>
</table>
    
</body>
</html>