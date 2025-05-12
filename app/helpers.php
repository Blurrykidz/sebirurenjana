<?php

function cekLevel($level){

    switch ($level){

        case 1:
            echo ' 	<span class="badge badge-primary">Admin</span>';
        break;

        case 2:
            echo ' 	<span class="badge badge-success">Kasir</span>';
        break;

    }
}

function cekAktif($status)
    {
        switch ($status)
        {
            case 1:
                echo ' 	<span class="badge badge-info">Aktif</span>';
            break;

            case 0:
                echo ' 	<span class="badge badge-danger">Tidak Aktif</span>';
            break;
        }
    }

    function rupiah($value){

        echo "Rp. " . number_format($value, 2, ",", ".");
    }


function cekBulan($bulan){
    switch ($bulan)
        {
            case 1:
                echo "Januari";
            break;
            case 2:
                echo "Februari";
            break;
            case 3:
                echo "Maret";
            break;
            case 4:
                echo "April";
            break;
            case 5:
                echo "Mei";
            break;
            case 6:
                echo "Juni";
            break;
            case 7:
                echo "Juli";
            break;
            case 8:
                echo "Agustus";
            break;
            case 9:
                echo "September";
            break;
            case 10:
                echo "Oktober";
            break;
            case 11:
                echo "November";
            break;
            case 12:
                echo "Desember";
            break;

        }
}

function cekPpn($status)
    {
        switch ($status)
        {
            case 1:
                echo ' 	<span class="badge badge-info">Exclude PPN</span>';
            break;

            case 0:
                echo ' 	<span class="badge badge-success">Include PPN</span>';
            break;
        }
    }



?>
