<?php 
  session_start();
  require "./functions.php";

  // cek ketersediaan cookie
  if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($koneksi, "SELECT nomer_hp FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan nomer hp
    if ($key === hash('sha256', $row['nomer_hp'])) {
      $_SESSION['login'] = true;
      $_SESSION["nohp"] = $row['nomer_hp'];
    }
  }

  // jika sudah ada session langsung arahkan ke index
  if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
  }

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
      <script src="../js/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <style>
          #pasien{
            background-image: url(img/image.jpg);
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
              <a href="#!" class="brand-logo">#GoVaksin</a>
              <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <li><a href="login.php"> Login </a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
          <!--SIDENAV-->
          <ul class="sidenav" id="mobile-nav">
            <li><a href="login.php">Login</a></li>
          </ul>
        <!--Input Data-->
      <form action="" method="post">
      <div class="container mb-5" id="pasien">
	      <h3 align="center" style="margin: 60px 10px 10px 10px;">Registrasi User</h3><hr>
        <div class="row center">
          <div class="col-sm-12">
            <div class="input-field col s12">
              <textarea id="no_hp" name="no_hp" class="materialize-textarea" data-length="120"></textarea>
              <label for="no_hp"><i class="material-icons">account_box</i>Nomer Handphone</label>
            </div>
            <div class="input-field col s6">
              <input id="password" name="password" type="password"  class="validate" required/>
              <label for="password"><i class="material-icons">lock_outline</i>Password</label>
            </div>
            <div class="input-field col s6">
              <input id="password2" name="password2" type="password"  class="validate" required/>
              <label for="password2"><i class="material-icons">lock_outline</i>Konfirmasi Password</label>
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
    </body>
  </html>