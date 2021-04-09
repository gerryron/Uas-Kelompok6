<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

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
                <li><a href="">Lihat Data</a></li>
                <li><a href="">Tambah Data</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
          <!--SIDENAV-->
          <ul class="sidenav" id="mobile-demo">
            <li><a href="">Lihat Data</a></li>
            <li><a href="">Tambah Data</a></li>
          </ul>
    <div class="container z-depth-2 min-height:580px">
      <div class="section">
        <h2 class="teal-text">DAFTAR DATA PASIEN COVID-19</h2>
        <div class="row">
          <table class=" striped">
            <tread>
              <tr class="cal s12 teal lighten-1">
                <th>No.</th>
                <th>Nama Faskes</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Kelamin</th>
                <th>Umur</th>
                <th>No.Telephone</th>
              </tr>
            </tread>
            <tbody>
              <tr>
                <td>1</td>
                <td>RSUD Fatmawati<td>
                <td>angelina<td>
                <td>1234567890123457<td>
                <td>Perempuan<td>
                <td>23<td>
                <td>098765<td>
                <td width="100px" align="center">
                <a class="btn-floating waves-effect waves-light teal"><i class="material-icons">create</i>
                <a class="btn-floating waves-effect waves-light teal"><i class="material-icons">file_download</i>
                <a class="btn-floating waves-effect waves-light teal"><i class="material-icons">delete</i>
                </td>
              </tr>
            <tbody>
          </table>
        </div>
      </div>
    </div>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>