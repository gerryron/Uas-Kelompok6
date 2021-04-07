<?php
  //buat koneksi ke database uas-kelompok6
  mysqli_connect()



?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <style>
          section{
            background-image: url(img/backgroun.jpg);
            background-repeat: no-repeat;
            background-size: cover;
          }
          form{
              height: 750px;
          }
      </style>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <!--login-->
        <section id="login" class="login">
            <div class="container ">
                <div class="row center">
                    <form class="col s12">
                        <h3 class="light teal-text text-lighten-1 center">LOGIN</h3>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">phone</i>
                            <input id="icon_telephone" type="tel" class="validate">
                            <label for="icon_telephone">Telephone</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">lock_outline</i>
                            <input id="password" type="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                        <button type="submit" class="btn tea">Login</button>
                    </form>
                </div>
            </div>
        </section>
        <!--Input Data-->
      <div class="container mb-5">
	      <h3 align="center" style="margin: 60px 10px 10px 10px;">DATA PASIEN COVID-19</h3><hr>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Provinsi</label>
              <select class="form-control" name="provinsi" id="provinsi">
                <option value=""> Pilih Provinsi</option>
              </select>
            </div>
        
            <div class="form-group">
              <label>Kota/Kabupaten</label>
              <select class="form-control" name="kabupaten" id="kabupaten">
                <option value=""></option>
              </select>
            </div>
  
            <div class="form-group">
              <label>Kecamatan</label>
              <select class="form-control" name="kecamatan" id="kecamatan">
                <option value=""></option>
              </select>
            </div>
            <div class="form-group">
              <label>Jenis Faskes</label>
              <select class="form-control" name="jenis" id="jenis">
                <option value=""></option>
              </select>
            </div>
            <div class="form-group">
              <label>Nama Faskes</label>
              <select class="form-control" name="faskes" id="faskes">
                <option value=""></option>
              </select>
            </div>
            <div class="input-field col s12">
              <textarea id="textarea2" class="materialize-textarea" data-length="120"></textarea>
              <label for="textarea2">NIK</label>
            </div>
            <div class="input-field col s12">
              <textarea id="textarea2" class="materialize-textarea" data-length="120"></textarea>
              <label for="textarea2">Nama</label>
            </div>
            <div class="input-field col s6">
              <input id="umur" type="number" class="validate">
              <label for="umur">Umur</label>
            </div>
            <div class="input-field col s6">
              <input id="hp" type="text" class="validate">
              <label for="hp">Tanggal Lahir</label>
            </div>
            <div class="input-field col s12">
              <textarea id="alamat" class="materialize-textarea" data-length="120"></textarea>
              <label for="alamat">Alamat</label>
          </div>
          </div>
        </div>
      </form>
    </div>
          </div>
        </div>
        <hr>
      </div>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      
    </body>
  </html>