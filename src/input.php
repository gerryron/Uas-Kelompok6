<?php 
  session_start();
  require "./functions.php";

  if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

  // if(!isset($_SESSION["register"])) {
  //   header("Location: index.php");
  //   exit;
  // }

  $provinsi = query("SELECT * FROM provinsi");
  $kota = query("SELECT * FROM kabupaten");
  $kecamatan = query("SELECT * FROM kecamatan");
  $faskes = query("SELECT nama_faskes FROM faskes");

  if(isset($_POST["submit"])){
    if(tambahData($_POST) >0){
      header("Location: index.php");
      exit;
    }else{
      echo mysqli_error($koneksi);
    }
  }

?>

<!DOCTYPE html>
  <html>
    <head>
      <!--datepicker-->
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
              <li><a href="index.php">Home</a></li>
              <li><a href="logout.php">Logout</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
          <!--SIDENAV-->
          <ul class="sidenav" id="mobile-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        <!--Input Data-->
      <form action="" method="post">
      <div class="container mb-5" id="pasien">
	      <h3 align="center" style="margin: 60px 10px 10px 10px;">DAFTAR VAKSIN COVID-19</h3><hr>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="provinsi"><i class="material-icons">add_location</i>Provinsi</label>
              <select class="form-control" name="provinsi" id="provinsi" required>
                <option value="" disabled selected> Pilih Provinsi</option>
                <?php 
                  foreach($provinsi as $row) :
                    $idProvinsi = $row["id_prov"];
                    $namaProvinsi = $row["nama"];
                ?>
                <option value="<?= $idProvinsi ?>"> <?= $namaProvinsi ?></option>
                <?php endforeach;?>
              </select>
            </div>
                    
            <div id="selectedArea-Kota">
            <div class="form-group">
              <label for="kota"><i class="material-icons">add_location</i>Kabupaten/Kota</label>
              <select class="form-control" name="kota" id="kota" required>
                <option value="" disabled selected> Pilih Kabupaten/Kota</option>
                  <?php 
                    foreach($kota as $row) :
                      $idKota = $row["id_kab"];
                      $namaKota = $row["nama"];
                  ?>
                <option value="<?= $idKota ?>"> <?= $namaKota ?></option>
                <?php endforeach;?>
              </select>
            </div>
  
            <div id="selectedArea-Kecamatan">
            <div class="form-group">
              <label for="kecamatan"><i class="material-icons">add_location</i>Kecamatan</label>
              <select class="form-control" name="kecamatan" id="kecamatan" required>
              <option value="" disabled selected> Pilih Kecamatan</option>
                <?php 
                  foreach($kecamatan as $row) :
                    $namaKecamatan = $row["nama"];
                ?>
                <option value="<?= $namaKecamatan ?>"> <?= $namaKecamatan ?></option>
                <?php endforeach;?>
              </select>
            </div>
            </div>
            </div>
            <div class="form-group">
              <label for="jenis"><i class="material-icons">local_hospital</i>Jenis Faskes</label>
              <select class="form-control" name="jenis" id="jenis" required>
              <option value="" disabled selected> Pilih Jenis Faskes</option>
              <option value="Puskesmas" > Puskesmas</option>
              <option value="RSUD" > RSUD</option>
              </select>
            </div>
            <div class="form-group">
              <label for="faskes"><i class="material-icons">local_hospital</i>Nama Faskes</label>
              <select class="form-control" name="faskes" id="faskes" required>
                <option value="" disabled selected> Pilih Nama Faskes</option>
                <?php 
                  foreach($faskes as $row) :
                    $namaFaskes = $row["nama_faskes"];
                ?>
                <option value="<?= $namaFaskes ?>"> <?= $namaFaskes ?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="input-field col s6">
              <textarea id="nama" name="nama" class="materialize-textarea" data-length="120" required></textarea>
              <label for="nama"><i class="material-icons">person_pin</i>Nama</label>
            </div>
            <div class="input-field col s6">
              <textarea id="nik" name="nik" class="materialize-textarea" maxlength="16" required></textarea>
              <label for="nik"><i class="material-icons">create</i>NIK</label>
            </div>
            <div class="form-group">
              <label for="jk"><i class="material-icons">people_outline</i>Jenis Faskes</label>
              <select class="form-control" name="jk" id="jk" required>
              <option value="" disabled selected> Pilih Jenis Kelamin</option>
              <option value="Laki Laki" > Laki-Laki</option>
              <option value="Perempuan" > Perempuan</option>
              </select>
            </div>
            <div class="input-field col s6">
              <input id="umur" name="umur" type="number" min="12" max="65" class="validate" required/>
              <label for="umur"><i class="material-icons">perm_identity</i>Umur</label>
            </div>
            <div class="input-field col s6">
              <input id="tanggal" name="tgl_lahir" type="text" class="form-control datepicker"  required/>
              <label for="tanggal"><i class="material-icons">today</i>Tanggal Lahir</label>
            </div>
            <div class="input-field col s12">
              <textarea id="no_hp" name="no_hp" class="materialize-textarea" data-length="120" readonly><?= $_SESSION["nohp"];?></textarea>
              <label for="no_hp"><i class="material-icons">account_box</i>No Hp</label>
            </div>
            <div class="input-field col s12">
              <textarea id="alamat" name="alamat" class="materialize-textarea" data-length="120"></textarea>
              <label for="alamat"><i class="material-icons">add_location</i>Alamat</label>
            </div>
            <button type="submit" name="submit" class="waves-effect waves-light btn">DAFTAR</button>
          </div>
        </div>
      </div>
      </form>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script>
           const sideNav = document.querySelectorAll('.sidenav');
           M.Sidenav.init(sideNav);
        $(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
      </script>
      <script>
        var selectedProvinsi = document.getElementById("provinsi");
        var areaKota = document.getElementById("selectedArea-Kota");
        

        selectedProvinsi.addEventListener('change', function() {

          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
            if(xhr.readyState == 4 && xhr.status == 200 ) {
              areaKota.innerHTML = xhr.responseText;
            }
          }
          
          xhr.open('GET', '../ajax/wilayah.php?idProv=' + selectedProvinsi[selectedProvinsi.selectedIndex].value, true);
          xhr.send();
          
        })
      </script>
      
    </body>
  </html>