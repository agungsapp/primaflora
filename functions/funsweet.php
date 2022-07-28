<?php

if (isset($berhasil)) {
    if ($berhasil) {
        echo 'swal("Berhasil !", "Datamu berhasil di tambahkan !", "success");';
    } else {
        echo 'swal("Gagal !", "Datamu gagal di tambahkan", "error");';
    }
}
