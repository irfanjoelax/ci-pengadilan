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
        <section class="text-end mb-3">
            <div class="btn btn-outline-dark rounded-0 py-3 px-5">
                PEN.4.1
            </div>
        </section>
        <section class="text-center mb-5">
            <h5 class="fw-bold">PENETAPAN</h5>
            <h6>Nomor: <?= $data->no_perkara ?></h6>
        </section>
        <section class="mb-3">
            <p class="text-uppercase fw-bold text-indent">
                demi keadilan berdasarkan ketuhanan yang maha esa
            </p>
            <p class="text-indent">
                Hakim Pengadilan Negeri Tondano;
            </p>
            <table>
                <tr>
                    <td width="25%" class="text-indent align-text-top">Membaca;</td>
                    <td width="75%" class="text-justify align-text-top">
                        <?= $data->membaca ?>
                    </td>
                </tr>
            </table>
            <p class="text-indent text-justify">
                Menimbang, bahwa untuk mengadili perkara tersebut, maka perlu ditetapkan hari sidang sebagaimana di
                bawah ini;
            </p>
            <p class="text-indent text-justify">
                Memperhatikan Pasal 152 Undang-Undang Nomor 8 Tahun 1981 tentang Hukum Acara Pidana;
            </p>
            <p class="text-center text-uppercase fw-bold">
                Menetapkan:
            </p>
            <ol class="text-justify">
                <li>
                    Menentukan sidang pada <?= tanggal($data->tgl_menetapkan) ?> pukul <?= substr($data->wkt_menetapkan, 0, 5) ?> WITA
                </li>
                <li>
                    Memerintahkan Penuntut Umum pada Kejaksaan Negeri Tondano untuk menghadapkan terdakwa, alat buktim
                    dan barang bukti.
                </li>
            </ol>
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
                <td class="pb-4">Hakim,</td>
            </tr>
            <tr>
                <td width="60%"></td>
                <td class="pt-5"><?= $data->nama_hakim ?></td>
            </tr>
        </table>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>