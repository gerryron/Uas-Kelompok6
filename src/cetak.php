<?php
  require "./functions.php";
  $userProvinsi = $_GET["prov"];
  $pasien = query("SELECT * FROM pasien WHERE provinsi='$userProvinsi'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cetak Data</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="../js/jquery-3.4.1.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

  <style>
      #pasien{
        background-image: url(../img/image.jpg);
        background-size: cover;
      }
  </style>
</head>
<body>
  <div class="container center bg-info text-white">
  <h3>Daftar Peserta Vaksinasi Covid-19 <?php if(isset($userProvinsi)) echo $userProvinsi; ?></h3>
  <h4>Per <?= date('d F Y h:i:s', time())?></h4>
  <table class="table text-white">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Faskes</th>
        <th scope="col">Nama</th>
        <th scope="col">NIK</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Umur</th>
        <th scope="col">No. Hp</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $counter = 1;
        foreach($pasien as $row) : 
      ?>
      <tr>
        <td scope="row"><?= $counter ?></td>
        <td scope="row"><?= $row["faskes"] ?></td>
        <td scope="row"><?= $row["nama"] ?></td>
        <td scope="row"><?= $row["nik"] ?></td>
        <td scope="row"><?= $row["jenis_kelamin"] ?></td>
        <td scope="row"><?= $row["umur"] ?></td>
        <td scope="row"><?= $row["nomer_hp"] ?></td>
        <td scope="row">
          <a href="edit.php?id=<?= $row["id"];?>" class="btn-floating waves-effect waves-light cyan"><i class="material-icons">create</i></a>
          <a href="delete.php?id=<?= $row["id"];?>" class="btn-floating waves-effect waves-light cyan"><i class="material-icons">delete</i>
        </td>
      </tr>
      <?php 
        $counter++;
        endforeach;
      ?>
    </tbody>
  </table>
  </div>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script>
    window.print();
  </script>
</body>
</html>