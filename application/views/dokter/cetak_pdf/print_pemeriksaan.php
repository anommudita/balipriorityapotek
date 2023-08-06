<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemeriksaaan </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        h2,
        h3 {
            margin: 5px 0;
        }

        .text {
            font-size: 11px;
        }

        .text1 {
            font-size: 13px;
        }

        .text2 {
            font-size: 15px;
        }

        .text3 {
            font-size: 10px;
        }

        .text-center {
            text-align: center;
        }

        .line-title {
            border: 1px solid black;
        }

        .bold {
            font-weight: bold;
        }

        .bold1 {
            font-weight: bold;
            color: white;
        }

        table {
            border-collapse: collapse;
        }

        .bg {
            background-color: #3767f9;
        }

        .div {
            margin-top: 10px;
        }
    </style>


</head>

<body>
    <!-- <h2 style="text-align: center;">FORM PEMERIKSAAN</h2>
    <h3 style="text-align: center;">BALI PRIORITY APOTEK</h3> -->
    <table width="100%" border="0">
        <tr>
            <td style="width: 30%;"><img src="<?= $logo; ?>" height="80px" class="logo"></td>
            <td>
                <h3 style="text-align: center;">FORM PEMERIKSAAN</h3>
                <h4 style="text-align: center;">BALI PRIORITY APOTEK</h4>
            </td>
        </tr>
    </table>

    <hr class="line-title">
    <!-- Data pasien -->
    <div class="col">
        <table width="100%" align="center">
            <tr>
                <td style="width: 30%;" class="text2">No Riwayat</td>
                <td style="width: 3%;" class="text2">:</td>
                <td class="text2"><?= $pemeriksaan['no_rm'] ?></td>

            </tr>
            <tr>
                <td style="width: 30%;"class="text2">No Rekam Medis</td>
                <td style="width: 3%;"class="text2">:</td>
                <td class="text2"><?= $pemeriksaan['no_rekam_medis'] ?></td>
            </tr>
            <tr>
                <td style="width: 30%;" class="text2">Nama Pasien</td>
                <td style="width: 3%;" class="text2">:</td>
                <td class="text2"><?= $pemeriksaan['nama_pasien'] ?></td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td style="width: 30%;" class="text2">Tanggal Periksa</td>
                <td style="width: 3%;" class="text2">:</td>
                <td class="text2"><?= $tanggal_pemeriksaan ?></td>
            </tr>
            <tr>

                <td style="width: 30%;" class="text2">Dokter</td>
                <td style="width: 3%;" class="text2">:</td>
                <td class="text2"><?= $pemeriksaan['nama_dokter'] ?></td>
            </tr>
        </table>
    </div>
    <div class="div"></div>

    <table border="1" width="100%">
        <tr class="text-center bg bold1">
            <td>
                Form Pemeriksaan
            </td>
        </tr>
    </table>
    <table border="1" width="100%">
        <tr>
            <td style="width: 18%;" class="text-center bold">Subjektif</td>
            <td style="width: 82%;" class="text1">&nbsp;<?= $pemeriksaan['S'] ?></td>
        </tr>
        <tr>
            <td style="width: 18%;" class="text-center bold">Objektif</td>
            <td style="width: 82%;" class="text1">&nbsp;<?= $pemeriksaan['O'] ?></td>
        </tr>
        <tr>
            <td style="width: 18%;" class="text-center bold">Assesment</td>
            <td style="width: 82%;" class="text1">&nbsp;<?= $pemeriksaan['A'] ?></td>
        </tr>
        <tr>
            <td style="width: 18%;" class="text-center bold">Plan</td>
            <td style="width: 82%;" class="text1">&nbsp;<?= $pemeriksaan['P'] ?></td>
        </tr>
    </table>


    <br>
    <table width="100%">
        <tr class="text-center text2">
            <td>
                ~~~Dicetak~~~
            </td>
        </tr>

        <tr class="text-center text3">
            <td>
                <?= $tanggal ?>
            </td>
        </tr>
    </table>



</body>

</html>