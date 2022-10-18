<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url() ?>/asset/pdf/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/asset/pdf/style.css">
</head>

<body>
    <div class="px-5 my-3">
        <header>
            <table class="table table-sm table-borderless">
                <tr>
                    <td width="5%" class="align-top">
                        <img src="<?= base_url() ?>asset/img/logo.png" width="100">
                    </td>
                    <td width="55%" class="align-top">
                        <strong>PENGADILAN NEGERI TONDANO KELAS IB</strong> <br>
                        JI. Manguni No. 75 Tondano 95615 <br>
                        TeIp.(0431) 321122, 321241 Fax. (0431) 321241 <br>
                        Website : www.pn-tondano.po.id <br>
                        Email : info@pn-tondano.go.id
                    </td>
                    <td width="45%" class="align-top">
                        Plodel: 02.C/Pid/PN Tnn <br>
                        Penetapan Ketua Pengadilan Negeri <br>
                        tentang pemberian persetujuan <br>
                        penyitaan.(Pasal 3B (2) KUHAP).
                    </td>
                </tr>
            </table>
        </header>
        <section class="text-center mb-2">
            <h5 class="fw-bold space-alpha">PENETAPAN</h5>
            <h6>Nomor: <?= $data->no_perkara ?></h6>
        </section>
        <section class="mb-3">
            <p class="text-uppercase fw-bold text-indent">
                demi keadilan berdasarkan ketuhanan yang maha esa
            </p>
            <p class="text-indent">
                Ketua Pengadilan Negeri Tondano;
            </p>
            <p class="text-indent text-justify">
                <?= $data->membaca ?>
            </p>
            <table>
                <tr class="text-indent">
                    <td width="27%" class="align-top">Nama Lengkap</td>
                    <td width="3%" class="align-top">:</td>
                    <td width="70%" class="text-indent-0"><?= $data->nama ?></td>
                </tr>
                <tr class="text-indent">
                    <td width="27%" class="align-top">Tempat Lahir</td>
                    <td width="3%" class="align-top">:</td>
                    <td width="70%" class="text-indent-0"><?= $data->tempat_lahir ?></td>
                </tr>
                <tr class="text-indent">
                    <td width="27%" class="align-top">Umur/Tanggal Lahir</td>
                    <td width="3%" class="align-top">:</td>
                    <td width="70%" class="text-indent-0"><?= $data->umur ?> / <?= tanggal($data->tgl_lahir) ?></td>
                </tr>
                <tr class="text-indent">
                    <td width="27%" class="align-top">Jenis Kelamin</td>
                    <td width="3%" class="align-top">:</td>
                    <td width="70%" class="text-indent-0"><?= $data->kelamin ?></td>
                </tr>
                <tr class="text-indent">
                    <td width="27%" class="align-top" class="align-top">Tempat tinggal</td>
                    <td width="3%" class="align-top">:</td>
                    <td width="70%" class="text-indent-0">
                        <?= $data->tempat_tinggal ?>
                    </td>
                </tr>
                <tr class="text-indent">
                    <td width="27%" class="align-top">Agama</td>
                    <td width="3%" class="align-top">:</td>
                    <td width="70%" class="text-indent-0"><?= $data->agama ?></td>
                </tr>
                <tr class="text-indent">
                    <td width="27%" class="align-top">Pekerjaan</td>
                    <td width="3%" class="align-top">:</td>
                    <td width="70%" class="text-indent-0"><?= $data->pekerjaan ?></td>
                </tr>
            </table>
            <p class="text-indent text-justify">
                <?= $data->menimbang ?>
            </p>
            <p class="text-indent text-justify">
                Menimbang, bahwa setelah mempelajari uraian singkat kejadian perkara dan Berita Acara Penyitaan tanggal
                [TANGGAL PENYITAAN] maka penyitaan tersebut cukup alasan untuk disetujui; Memperhatikan Pasal 38 ayat
                (2) Undang-Undang Nomor 8 tahun 1981 tentang Hukum Acara Pidana;
            </p>
            <p class="text-center text-uppercase fw-bold mt-4 space-alpha">
                Menetapkan:
            </p>
            <p class="text-justify">
                <?= $data->menetapkan ?>
            </p>
        </section>

        <table class="table table-sm table-borderless mt-5">
            <tr>
                <td width="60%"></td>
                <td>
                    Ditetapkan di Tondano;
                </td>
            </tr>
            <tr>
                <td width="60%"></td>
                <td>Pada Tanggal <?= tanggal($data->tgl_ditetapkan) ?>;</td>
            </tr>
            <tr>
                <td width="60%"></td>
                <td class="pb-4 text-uppercase">ketua pengadilan negeri tondano,</td>
            </tr>
            <tr>
                <td width="60%"></td>
                <td class="pt-5 text-uppercase"><?= $data->nama_ketua ?></td>
            </tr>
        </table>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>