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
        <header class="text-center text-upppercase">
            <h3 class="fw-bold">PENGADILAN NEGERI TONDANO KELAS 1B</h3>
            <h4 class="fw-semibold">
                JALAN MANGUNI NO. 75 TONDANO <br>
                TELP. (0431) 321122
            </h4>
            <hr>
        </header>
        <section class="text-center mb-2">
            <h5 class="fw-bold">PETIKAN PUTUSAN</h5>
            <h6>Nomor: </h6>
            <h5 class="mt-3">
                ”DEMI KEADILAN BERDASARKAN KETUHANAN YANG MAHA ESA”
            </h5>
        </section>
        <p class="text-indent text-justify">
            Pengadilan Negeri Tondano yang mengadili perkara pidana dengan acara pemeriksaan biasa dalam tingkat pertama
            menjatuhkan
            putusan sebagai berikut dalam perkara Terdakwa
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
                <td width="27%" class="align-top">Kebangsaan</td>
                <td width="3%" class="align-top">:</td>
                <td width="70%" class="text-indent-0"><?= $data->kebangsaan ?></td>
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
        <div class="text-justify mt-4">
            <?= $data->membaca ?>
        </div>
        <div class="text-indent text-justify mt-2">
            Terdakwa menghadap sendiri;
        </div>
        <div class="text-justify mt-3">
            <?= $data->mengingat ?>
        </div>
        <div class="space-alpha text-center mt-2">
            MENGADILI:
        </div>
        <div class="text-justify mt-2">
            <?= $data->mengadili ?>
        </div>
        <div class="text-indent text-justify mt-2">
            Demikianlah diputuskan dalam sidang permusyawaratan Majelis Hakim Pengadilan Negeri Tondano, pada tanggal <?= tanggal($data->tgl_ditetapkan, true) ?> oleh kami, <?= $data->hakim_ketua ?>, sebagai Hakim Ketua, <?= $data->hakim_satu ?> dan <?= $data->hakim_dua ?> masing-masing sebagai Hakim Anggota, yang diucapkan dalam sidang terbuka untuk umum pada hari itu juga oleh Hakim Ketua dengan didampingi para Hakim Anggota tersebut, dibantu oleh <?= $data->panitera_pengganti ?>, Panitera pada Pengadilan Negeri Tondano, serta dihadiri oleh Penuntut Umum dan Terdakwa ;
        </div>
    </div>

    <table class="table table-sm table-borderless mt-5">
        <tr>
            <td width="60%"></td>
            <td>
                Ditetapkan di Tondano;
            </td>
        </tr>
        <tr>
            <td width="60%"></td>
            <td>Pada tanggal <?= tanggal($data->tgl_ditetapkan) ?>;</td>
        </tr>
    </table>
    <table class="table table-sm table-borderless">
        <tr>
            <td class="text-center">Hakim Anggota</td>
            <td class="text-center">Hakim Ketua</td>
        </tr>
        <tr>
            <td class="py-4"></td>
            <td class="py-4"></td>
        </tr>
        <tr>
            <td class="text-center"><?= $data->hakim_satu ?></td>
            <td class="text-center"><?= $data->hakim_ketua ?></td>
        </tr>
        <tr>
            <td class="py-4"></td>
        </tr>
        <tr>
            <td class="text-center"><?= $data->hakim_dua ?></td>
            <td class="text-center">Panitera Pengganti</td>
        </tr>
        <tr>
            <td class="py-4"></td>
            <td class="py-4"></td>
        </tr>
        <tr>
            <td class="text-center"></td>
            <td class="text-center"><?= $data->panitera_pengganti ?></td>
        </tr>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>