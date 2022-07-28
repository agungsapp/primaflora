<?php
require 'functions/functiontest.php';

$kuantiti = $_POST["kuantiti"];
$mulai = $_POST["mulai"];
$selesai = $_POST["akhir"];

// menghitung selisih tanggal
$mulai1 = new DateTime($mulai);
$selesai1 = new DateTime($selesai);
$difference = $mulai1->diff($selesai1);

$lamasewa = $difference->days;

if (!isset($_SESSION['log'])) {
    header('location:login.php');
} else {
    $ui = $_SESSION['id'];
    $cek = mysqli_query($conn, "select * from cart where userid='$ui' and status='Cart'");
    $liat = mysqli_num_rows($cek);
    $f = mysqli_fetch_array($cek);
    $orid = $f['orderid'];

    //kalo ternyata udeh ada order id nya
    if ($liat > 0) {

        //cek barang serupa
        $cekbrg = mysqli_query($conn, "select * from detailorder where idproduk='$idproduk' and orderid='$orid'");
        $liatlg = mysqli_num_rows($cekbrg);
        $brpbanyak = mysqli_fetch_array($cekbrg);
        $jmlh = $brpbanyak['qty'];

        //kalo ternyata barangnya ud ada
        if ($liatlg > 0) {
            $i = 1;
            $baru = $jmlh + $kuantiti;

            $updateaja = mysqli_query($conn, "update detailorder set qty='$baru' where orderid='$orid' and idproduk='$idproduk'");

            if ($updateaja) {
                echo " <div class='alert alert-success'>
                            Barang sudah pernah dimasukkan ke keranjang, jumlah akan ditambahkan
                          </div>
                          <meta http-equiv='refresh' content='1; url= product.php?idproduk=" . $idproduk . "'/>";
            } else {
                echo "<div class='alert alert-warning'>
                            Gagal menambahkan ke keranjang
                          </div>
                          <meta http-equiv='refresh' content='1; url= product.php?idproduk=" . $idproduk . "'/>";
            }
        } else {

            $tambahdata = mysqli_query($conn, "insert into detailorder (orderid,idproduk,qty,tglmulai,tglselesai,lamaorder) values('$orid','$idproduk','$kuantiti','$mulai','$selesai','$lamasewa')");
            if ($tambahdata) {
                // echo " <div class='alert alert-success'>
                //             Berhasil menambahkan ke keranjang
                //           </div>
                //         <meta http-equiv='' content='1; url= product.php?idproduk=" . $idproduk . "'/>  ";

                var_dump(cek($mulai, $selesai));
                $berhasil = true;
            } else {
                echo "<div class='alert alert-warning'>
                            Gagal menambahkan ke keranjang
                          </div>
                         <meta http-equiv='refresh' content='1; url= product.php?idproduk=" . $idproduk . "'/> ";
                $berhasil = false;
            }
        };
    } else {

        //kalo belom ada order id nya
        $oi = crypt(rand(22, 999), time());

        $bikincart = mysqli_query($conn, "insert into cart (orderid, userid) values('$oi','$ui')");

        if ($bikincart) {
            // $cek = cek($mulai, $selesai);

            // if(!$cek) {

            // }
            $tambahuser = mysqli_query($conn, "insert into detailorder (orderid,idproduk,qty,tglmulai,tglselesai) values('$oi','$idproduk','$kuantiti','$mulai','$selesai')");
            if ($tambahuser) {
                echo " <div class='alert alert-success'>
                            Berhasil menambahkan ke keranjang
                          </div>
                        <meta http-equiv='refresh' content='1; url= product.php?idproduk=" . $idproduk . "'/>  ";
            } else {
                echo "<div class='alert alert-warning'>
                            Gagal menambahkan ke keranjang
                          </div>
                         <meta http-equiv='refresh' content='1; url= product.php?idproduk=" . $idproduk . "'/> ";
            }
        } else {
            echo "gagal bikin cart";
        }
    }
}
