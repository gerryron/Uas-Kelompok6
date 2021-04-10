<?php 
  session_start();
  require "./functions.php";

  if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

  $id = $_GET["id"];
  mysqli_query($koneksi, "DELETE FROM pasien WHERE id='$id'");
  header("Location: index.php");
  exit;
?>