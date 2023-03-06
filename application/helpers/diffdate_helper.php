<?php

function diffdate($start, $end)
{
    $tgl1 = new DateTime($start);
    $tgl2 = new DateTime($end);
    $jarak = $tgl2->diff($tgl1);

    return $jarak->days;
}
