<?php
  require "../src/functions.php";
  $idProvinsi = $_GET["idProv"];
  
  $kota = query("SELECT * FROM kabupaten WHERE id_prov='$idProvinsi'");
  $kecamatan = query("SELECT * FROM kecamatan");
?>

<div class="form-group">
  <label for="kota"><i class="material-icons">add_location</i>Kabupaten/Kota</label>
  <select class="form-control" name="kota" id="kota" required>
    <option value="" disabled selected> Pilih Kabupaten/Kota</option>
      <?php 
        foreach($kota as $row) :
          $namaKota = $row["nama"];
      ?>
    <option value="<?= $namaKota ?>"> <?= $namaKota ?></option>
    <?php endforeach;?>
  </select>
</div>

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
