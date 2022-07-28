<?php
$cekstatus = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk=$idproduk and status='tersedia'");
$berapa = mysqli_num_rows($cekstatus);

if ($berapa > 0) {
    $tersedia = true;
} else {
    $tersedia = false;
    $disabled = true;
}
