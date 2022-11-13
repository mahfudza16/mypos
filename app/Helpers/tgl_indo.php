<?php

function tgl_indo($date){
    $nama_hari = array("Ahad", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $nama_bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
    "Oktober", "November", "Desember");

    $tahun = substr($date,0,4);
    $bulan = substr($date,5,2);
    $tanggal = substr($date,8,2);
    $waktu = substr($date,11,5);
    $hari = date("w", strtotime($date));
    $result = $nama_hari[$hari].", ".$tanggal." ".$nama_bulan[(int)$bulan-1]." ".$tahun." ".$waktu;
    return $result;
}

?>