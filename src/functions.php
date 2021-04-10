<?php 
    $koneksi = mysqli_connect("localhost","root","P@ssw0rd", "uas_kelompok6");
    if(!$koneksi){
        die("gagal terhubung dengan database : ".mysqli_connect_error());
    } 

    function query($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function registrasi($data){
      global $koneksi;
      $noHp = $data["no_hp"];
      $password = mysqli_real_escape_string($koneksi,$data["password"]);
      $password2 = mysqli_real_escape_string($koneksi,$data["password2"]);

      $result = mysqli_query($koneksi, "SELECT nomer_hp FROM users WHERE nomer_hp = '$noHp'"); 
      if(mysqli_fetch_assoc($result)){
          echo "<script>
            alert('Nomer HP sudah terdaftar di sistem.');
          </script>";
          return false;
      } 

      if ($password != $password2) {
          echo "<script>
                  alert('Konfirmasi Password tidak sesuai');
              </script>";
          return false;
      }

      $password = password_hash($password, PASSWORD_DEFAULT);
      mysqli_query($koneksi, "INSERT INTO users VALUES (NULL, '$noHp', '$password')");

      return mysqli_affected_rows($koneksi);
  }

    function tambahData($data){
        global $koneksi;
        $provinsi = $data["provinsi"];
        $kota = $data["kota"];
        $kecamatan = $data["kecamatan"];
        $jenis = $data["jenis"];
        $faskes = $data["faskes"];
        $nik = $data["nik"];
        $nama = $data["nama"];
        $jk = $data["jk"];
        $umur = $data["umur"];
        $tglLahir = $data["tgl_lahir"];
        $alamat = $data["alamat"];
        $noHp = $data["no_hp"];

        $result = mysqli_query($koneksi, "SELECT * FROM pasien WHERE nik = '$nik' OR nomer_hp = '$noHp'");
        if(mysqli_affected_rows($koneksi) >= 1){
          echo "<script>
            alert('NIK / Nomer HP sudah terdaftar di sistem.');
          </script>";
          return false;
        } 

        mysqli_query($koneksi, "INSERT INTO pasien VALUES 
              (NULL, '$provinsi', '$kota', '$kecamatan', '$jenis', '$faskes', '$nik', '$nama', '$jk', '$umur', '$tglLahir', '$alamat', '$noHp')");

        return mysqli_affected_rows($koneksi);
    }


    function updateData($data){
      global $koneksi;
      $id = $data["id"];
      $provinsi = $data["provinsi"];
      $kota = $data["kota"];
      $kecamatan = $data["kecamatan"];
      $jenis = $data["jenis"];
      $faskes = $data["faskes"];
      $nik = $data["nik"];
      $nama = $data["nama"];
      $jk = $data["jk"];
      $umur = $data["umur"];
      $tglLahir = $data["tgl_lahir"];
      $alamat = $data["alamat"];
      $nomerHp = $data["nomerHp"];

      $result = mysqli_query($koneksi, "SELECT * FROM pasien WHERE nik = '$nik' OR nomer_hp = '$nomerHp'"); 
      if(mysqli_affected_rows($result) >= 1){
        echo "<script>
          alert('NIK / Nomer HP sudah terdaftar di sistem.');
        </script>";
        return false;
      } 

      mysqli_query($koneksi, "UPDATE pasien SET provinsi='$provinsi', kota='$kota', kecamatan='$kecamatan', 
        jenis_faskes='$jenis', faskes='$faskes', nik='$nik', nama='$nama', jenis_kelamin='$jk', umur='$umur', tanggal_lahir='$tglLahir', alamat='$alamat'
        WHERE id='$id'");

      return mysqli_affected_rows($koneksi);
  }
?>