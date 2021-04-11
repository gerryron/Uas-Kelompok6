<?php
  session_start();
  require "./functions.php";
  date_default_timezone_set('Asia/Jakarta');

  if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }
  
  $userProvinsi = $_GET["prov"];
  $pasien = query("SELECT * FROM pasien WHERE provinsi='$userProvinsi'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body {
      font-family: arial;
    }
    h1,h3 {
      text-align : center;
    }

    tr:nth_child(even) {
      background-color: #ddd;
    }
  </style>
</head>
<body>
  <br>
  <h1>Daftar Peserta Vaksinasi Covid-19 <?php if(isset($userProvinsi)) echo $userProvinsi; ?></h3>
  <h3>Per <?= date('d F Y h:i:s')?></h4>
  <table align="center" border="1" cellpadding="10" cellspacing ="0">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Faskes</th>
        <th scope="col">Nama</th>
        <th scope="col">NIK</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Umur</th>
        <th scope="col">No. Hp</th>
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
      </tr>
      <?php 
        $counter++;
        endforeach;
      ?>
    </tbody>
  </table>
  <script>
    window.print();
  </script>
</body>
</html>