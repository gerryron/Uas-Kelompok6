<?php
  session_start();
  require "./functions.php";

  // cek ketersediaan cookie
  if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($koneksi, "SELECT nomer_hp FROM pasien WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan nomer hp
    if ($key === hash('sha256', $row['nomer_hp'])) {
      $_SESSION['login'] = true;
    }
  }

  // jika sudah ada session langsung arahkan ke index
  if (isset($_SESSION['login'])) {
    header("Location: data.php");
    exit;
  }

  if(isset($_POST["login"])) {
    $nomerHp = $_POST["telephone"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT id, nomer_hp, password FROM pasien WHERE nomer_hp = '$nomerHp'");

    if (mysqli_num_rows($result) === 1){
      $row = mysqli_fetch_assoc($result);

      // set session & cookie 10 menit jika berhasil login
      if (password_verify($password, $row["password"])) {
        $_SESSION["login"] = true;

        if (isset($_POST["remember"])){
          setcookie('id', $row['id'], time()+600);
          setcookie('key', hash('sha256', $row['nomer_hp']), time()+600);
        }
        
        header("Location: data.php");
        exit;
      }
    }
    $error = true;
  }
?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <style>
          section{
            background-image: url(img/backgroun.jpg);
            background-repeat: no-repeat;
            background-size: cover;
          }
          form{
              height: 550px;
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
              <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                <li><a href="registrasi.php">Tambah Data</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
          <!--SIDENAV-->
          <ul class="sidenav" id="mobile-nav">
          <li><a href="registrasi.php">Tambah Data</a></li>
          </ul>
        <!--login-->
      <section id="login" class="login">
        <div class="container ">
          <div class="row center">
            <?php if(isset($error)) :?>
              <p style="color: red; font-style: italic; ">nomer telephone/ password salah</p>
            <?php endif; ?>
            <form action="" method="post" class="col s12">
              <h3 class="light teal-text text-lighten-1 center">LOGIN</h3>
                <div class="input-field col s6">
                  <i class="material-icons prefix">phone</i>
                  <input id="icon_telephone" type="tel" name="telephone" class="validate">
                  <label for="icon_telephone">Telephone</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">lock_outline</i>
                  <input id="password" type="password" name="password" class="validate">
                  <label for="password">Password</label>
                </div>
                <button type="submit" name="login" class="btn tea">Login</button>
            </form>
          </div>
        </div>
      </section>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/materialize.min.js"></script>
          <script>
           const sideNav = document.querySelectorAll('.sidenav');
           M.Sidenav.init(sideNav);
          </script>
    </body>
  </html>