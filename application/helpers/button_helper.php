<?php

function button_back($url)
{
    $button =   '<a href="' . site_url($url) . '" class="btn btn-danger pull-right" style="margin-left: 1rem;">
                    Kembali ke daftar
                </a>';

    return $button;
}

function button_edit($url)
{
    $button =   '<a href="' . site_url($url) . '" class="btn btn-warning btn-xs">
                    <i class="fa fa-pencil-square"></i>
                </a>';

    return $button;
}

function button_delete($url)
{
    $button =   '<a onclick="return confirm(`Apakah yakin ingin menghapus data berikut ini?`)" href="' . site_url($url) . '" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash"></i>
                </a>';

    return $button;
}

function button_download($url)
{
    $button =   '<a href="' . base_url($url) . '" class="btn btn-info btn-xs" target="_blank">
                    <i class="fa fa-download"></i>
                </a>';

    return $button;
}

function button_show($url)
{
    $button =   '<a href="' . base_url($url) . '" class="btn btn-default btn-xs">
                    <i class="fa fa-eye"></i>
                </a>';

    return $button;
}

function button_print($url)
{
    $button =   '<a href="' . base_url($url) . '" class="btn btn-danger btn-xs" target="_blank">
                    <i class="fa fa-print"></i>
                </a>';

    return $button;
}
