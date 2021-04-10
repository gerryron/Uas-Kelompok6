<?php
  session_start();
  require "./functions.php";

  if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

  $noHpUser = $_SESSION["nohp"];
  $user = query("SELECT provinsi, kota, kecamatan FROM pasien WHERE nomer_hp='$noHpUser'");
  if (mysqli_affected_rows($koneksi) > 0) {
    $_SESSION["register"] = true;
    $userProvinsi = $user[0]["provinsi"];
    $pasien = query("SELECT * FROM pasien WHERE provinsi='$userProvinsi'");
  } else {
    $pasien = [];
    header("Location: input.php");
  }

?>

<!DOCTYPE html>
  <html>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <script src="../js/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      
      <style>
      table{
        border-collapse: collapse:
      }
      th,td{
        padding: 8px:
      }
      </style>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    <!--navbar-->
    <div class="navbar-fixed">
        <nav class="cyan darken-2">
          <div class="container">
            <div class="nav-wrapper">
              <a href="#!" class="brand-logo">#LawanCorona</a>
              <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <?php if(!$_SESSION["register"]) : ?>
                  <li><a href="input.php">Daftar Vaksin</a></li>
                <?php endif; ?>
                <li><a href="cetak.php?prov=<?= $userProvinsi;?>">Cetak Halaman</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
          <!--SIDENAV-->
          <ul class="sidenav" id="mobile-nav">
            <li><a href="input.php">Daftar Vaksin</a></li>
            <li><a href="cetak.php">Cetak Halaman</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
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
      
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script>
           const sideNav = document.querySelectorAll('.sidenav');
           M.Sidenav.init(sideNav);
          </script>
    </body>
  </html>