<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informed Consent Psikologi</title>
</head>

<style>
    td {
        font-size: 12px;
    }
</style>

<body>
    <h2 style="text-align: center;">Informed Consent Psikologi (Allo)</h2>
    <table>
        <tr>
            <td>Yang bertanda tangan dibawah ini, saya</td>
        </tr>
    </table>
    <table style="margin-left: 15px;" width="100%">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $pasien['nama'] ?></td>
        </tr>
        <tr>
            <td>Alamat Rumah</td>
            <td>:</td>
            <td><?= $pasien['alamat'] ?></td>
        </tr>
        <tr>
            <td style="width: 10%;">Umur</td>
            <td style="width: 1%;">:</td>
            <td style="width: 35%;"><?= $pasien['umur'] ?> tahun</td>
        </tr>
    </table>
    <table>
        <tr>
            <td>Orangtua/Wali/keluarga dari : </td>
        </tr>
    </table>
    <table style="margin-left: 15px; margin-bottom:10px" width="100%">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td>Alamat Rumah</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 10%;">Umur</td>
            <td style="width: 1%;">:</td>
            <td style="width: 35%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tahun</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="text-align: justify; text-indent:30px;">
                Saya dalam hal ini bertindak sebagai orangtua/wali/keluarga klien/pasien telah mendapatkan penjelasan dan informasi mengenai tindakan psikologis untuk anak/keluarga saya, dan saya bersedia sepenuhnya mendapatkan layanan tindakan/terapi psikologi klinis pada diri anak/keluarga saya. Saya memahami sepenuhnya dan saya tidak akan mengajukan complain maupun tuntutan hukum sehubungan dengan hasil maupun tindakan yang akan anak/keluarga saya peroleh.
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <p style="text-align: justify;">Saya mengijinkan psikologi klinis untuk menyentuh bagian tubuh tertentu (kepala, bahu, tangan) sebagai bagian dari tindakan /terapi psikologi klinis.</p>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="text-align: justify;">Saya memahami bahwa jika anak/keluarga saya memiliki diagnose media lain, saya menginformasikan dengan jelas kepada psikolog.</td>
        </tr>
    </table>

    <table>
        <tr>
            <td>
                <ul>
                    <li>
                        Anak/keluarga saya tidak memiliki penyakit medis yang gawat
                    </li>
                    <li>
                        Anak/keluarga telah mendapatkan rujukan dari dokter bahwa saya dapat menerima tindakan/terapi psikologi klinis.
                    </li>
                </ul>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td tyle="text-align: justify;">Demikian pernyataan ini dibuat dengan penuh kesadaran tanpa ada paksaan dari pihak manapun.</td>
        </tr>
    </table>

    <table width="100%" style="margin-top: 30px; text-align: center; ">
        <tr>
            <td style="width: 35%;">Saksi/keluarga</td>
            <td style="width: 30%;"></td>
            <td style="width: 45%;">Denpasar, <?= $tanggal ?></td>
        </tr>
        <tr>
            <td style="height: 10%;"></td>
        </tr>
        <tr>
            <!-- nama keluarga -->
            <td style="width: 35%;">..................................</td>
            <td style="width: 35%;"></td>
            <!-- nama pasien -->
            <td style="width: 45%;"><?= $pasien['nama'] ?></td>
        </tr>

    </table>
</body>
</html>