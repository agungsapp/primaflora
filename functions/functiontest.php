<?php

// select * from cart where userid between '1' and '5';

function cek($tglmulai, $tglselesai)
{
    global $conn;


    $mulai = mysqli_real_escape_string($conn, $tglmulai);
    $selesai = mysqli_real_escape_string($conn, $tglselesai);
    $cek = mysqli_query($conn, "SELECT * FROM detailorder where tglmulai BETWEEN $tglmulai AND $tglselesai");

    return $cek;
}

