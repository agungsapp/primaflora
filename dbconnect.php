<?php
// isi nama host, username mysql, dan password mysql anda
$conn = mysqli_connect("localhost", "root", "", "db_primaflora");

if (!$conn) {
	echo "gagal konek database menn";
} else {
};
