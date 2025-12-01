<?php 

function hitungSisaWaktu($deadline)
{
    $now = new DateTime();
    $target = new DateTime($deadline);
    $diff = $now->diff($target);

    if ($now > $target) {
        return 'Sudah lewat deadline';
    }

    $format = '';
    if ($diff->d > 0) $format .= $diff->d . ' hari ';
    if ($diff->h > 0) $format .= $diff->h . ' jam ';
    if ($diff->i > 0) $format .= $diff->i . ' menit';

    return 'Sisa waktu: ' . trim($format);
}