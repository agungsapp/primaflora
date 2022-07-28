<?php
require 'functions/functiontest.php';

$mulai = $_POST["mulai"];
$selesai = $_POST["akhir"];

// menghitung selisih tanggal
$mulai1 = new DateTime($mulai);
$selesai1 = new DateTime($selesai);
$difference = $mulai1->diff($selesai1);

$lamasewa = $difference->days;

// if (!isset($_SESSION['log'])) {
//     header('location:login.php');
// } else {

//     $ui = $_SESSION['id'];
//     $orid = $f['orderid'];

//     $oi = crypt(rand(22, 999), time());

//     $bikincart = mysqli_query($conn, "insert into cart (orderid, userid) values('$oi','$ui')");

//     if ($bikincart) {
//         // $cek = cek($mulai, $selesai);

//         // if(!$cek) {

//         // }
//         $tambahuser = mysqli_query($conn, "insert into detailorder (orderid,idproduk,tglmulai,tglselesai, lamaorder) values('$oi','$idproduk','$mulai','$selesai','$lamasewa')");
//         if ($tambahuser) {
//             $updatestatus = mysqli_query($conn, "UPDATE produk SET status='tidak tersedia' WHERE idproduk=$idproduk");
//             echo " <div class='alert alert-success'>
//                             Berhasil menambahkan ke keranjang
//                           </div>
//                         <meta http-equiv='' content='1; url= product.php?idproduk=" . $idproduk . "'/>  ";
//         } else {

//             echo "<div class='alert alert-warning'>
//                             Gagal menambahkan ke keranjang
//                           </div>
//                          <meta http-equiv='' content='1; url= product.php?idproduk=" . $idproduk . "'/> ";
//         }
//     } else {
//         echo "gagal bikin cart";
//     }
// }


// ========================================================================================================================================
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
        // $brpbanyak = mysqli_fetch_array($cekbrg);
        // $jmlh = $brpbanyak['qty'];

        //kalo ternyata barangnya ud ada
        if ($liatlg > 0) {
        } else {

            $tambahdata = mysqli_query($conn, "insert into detailorder (orderid,idproduk,userid,tglmulai,tglselesai,lamaorder) values('$orid','$idproduk','$ui','$mulai','$selesai','$lamasewa')");
            if ($tambahdata) {
                // echo " <div class='alert alert-success'>
                //             Berhasil menambahkan ke keranjang
                //           </div>
                //         <meta http-equiv='' content='1; url= product.php?idproduk=" . $idproduk . "'/>  ";

                $updatestatusproduk = mysqli_query($conn, "UPDATE produk SET status='tidak tersedia' WHERE idproduk=$idproduk");
                var_dump(cek($mulai, $selesai));
                $berhasil = true;
                echo "<meta http-equiv='refresh' content='1; url= product.php?idproduk=" . $idproduk . "'/> ";
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
            $tambahuser = mysqli_query($conn, "insert into detailorder (orderid,idproduk,userid,tglmulai,tglselesai,lamaorder) values('$oi','$idproduk','$ui','$mulai','$selesai','$lamasewa')");
            if ($tambahuser) {
                echo " <div class='alert alert-success'>
                            Berhasil menambahkan ke keranjang
                          </div>
                        <meta http-equiv='refresh' content='1; url= product.php?idproduk=" . $idproduk . "'/>  ";
                $updatestatusproduk = mysqli_query($conn, "UPDATE produk SET status='tidak tersedia' WHERE idproduk=$idproduk");
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
