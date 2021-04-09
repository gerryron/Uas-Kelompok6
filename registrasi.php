<?php 
  require "./functions.php";
  $provinsi = query("SELECT nama_wilayah FROM wilayah WHERE level = 1");
  $kota = query("SELECT nama_wilayah FROM wilayah WHERE level = 2");
  $kecamatan = query("SELECT nama_wilayah FROM wilayah WHERE level = 3");
  $faskes = query("SELECT nama_faskes FROM faskes");

  if(isset($_POST["submit"])){
    if(registrasi($_POST) >0){
      echo "<script> alert(' data pasien berhasil di tambahkan');</script>";
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
      <script src="js/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <style>
          #pasien{
            background-image: url(img/gambar.jpeg);
            background-repeat: no-repeat;
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
              <a href="#!" class="brand-logo">ZA</a>
              <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <li><a href="login.php"> Login </a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
          <!--SIDENAV-->
          <ul class="sidenav" id="mobile-demo">
            <li><a href="">Lihat Data</a></li>
          </ul>
        <!--Input Data-->
      <form action="" method="post">
      <div class="container mb-5" id="pasien">
	      <h3 align="center" style="margin: 60px 10px 10px 10px;">DATA PASIEN COVID-19</h3><hr>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="provinsi">Provinsi</label>
              <select class="form-control" name="provinsi" id="provinsi">
                <option value="" disabled selected> Pilih Provinsi</option>
                <?php 
                  foreach($provinsi as $row) :
                    $namaProvinsi = $row["nama_wilayah"];
                ?>
                <option value="<?= $namaProvinsi ?>"> <?= $namaProvinsi ?></option>
                <?php endforeach;?>
              </select>
            </div>
        
            <div class="form-group">
              <label for="kota">Kabupaten/Kota</label>
              <select class="form-control" name="kota" id="kota">
                <option value="" disabled selected> Pilih Kabupaten/Kota</option>
                  <?php 
                    foreach($kota as $row) :
                      $namaKota = $row["nama_wilayah"];
                  ?>
                <option value="<?= $namaKota ?>"> <?= $namaKota ?></option>
                <?php endforeach;?>
              </select>
            </div>
  
            <div class="form-group">
              <label for="kecamatan">Kecamatan</label>
              <select class="form-control" name="kecamatan" id="kecamatan">
              <option value="" disabled selected> Pilih Kecamatan</option>
                <?php 
                  foreach($kecamatan as $row) :
                    $namaKecamatan = $row["nama_wilayah"];
                ?>
                <option value="<?= $namaKecamatan ?>"> <?= $namaKecamatan ?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="form-group">
              <label for="jenis">Jenis Faskes</label>
              <select class="form-control" name="jenis" id="jenis">
              <option value="" disabled selected> Pilih Jenis Faskes</option>
              <option value="Puskesmas" > Puskesmas</option>
              <option value="RSUD" > RSUD</option>
              </select>
            </div>
            <div class="form-group">
              <label for="faskes">Nama Faskes</label>
              <select class="form-control" name="faskes" id="faskes">
                <option value="" disabled selected> Pilih Nama Faskes</option>
                <?php 
                  foreach($faskes as $row) :
                    $namaFaskes = $row["nama_faskes"];
                ?>
                <option value="<?= $namaFaskes ?>"> <?= $namaFaskes ?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="input-field col s12">
              <textarea id="nik" name="nik" class="materialize-textarea" maxlength="16"></textarea>
              <label for="nik">NIK</label>
            </div>
            <div class="input-field col s12">
              <textarea id="nama" name="nama" class="materialize-textarea" data-length="120"></textarea>
              <label for="nama">Nama</label>
            </div>
            <div class="form-group">
              <label for="jk">Jenis Faskes</label>
              <select class="form-control" name="jk" id="jk">
              <option value="" disabled selected> Pilih Jenis Kelamin</option>
              <option value="Laki Laki" > Laki-Laki</option>
              <option value="Perempuan" > Perempuan</option>
              </select>
            </div>
            <div class="input-field col s6">
              <input id="umur" name="umur" type="number" min="12" max="65" class="validate" required/>
              <label for="umur">Umur</label>
            </div>
            <div class="input-field col s6">
              <input id="tanggal" name="tgl_lahir" type="text" class="form-control datepicker"  required/>
              <label for="tanggal">Tanggal Lahir</label>
            </div>
            <div class="input-field col s12">
              <textarea id="no_hp" name="no_hp" class="materialize-textarea" data-length="120"></textarea>
              <label for="no_hp">No Hp</label>
            </div>
            <div class="input-field col s12">
              <textarea id="alamat" name="alamat" class="materialize-textarea" data-length="120"></textarea>
              <label for="alamat">Alamat</label>
            </div>
            <div class="input-field col s6">
              <input id="password" name="password" type="password"  class="validate" required/>
              <label for="password">Password</label>
            </div>
            <div class="input-field col s6">
              <input id="password2" name="password2" type="password"  class="validate" required/>
              <label for="password2">Konfirmasi Password</label>
            </div>
            <button type="submit" name="submit" class="waves-effect waves-light btn">DAFTAR</button>
          </div>
        </div>
      </div>
      </form>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script>
        $(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
      </script>
    </body>
  </html>