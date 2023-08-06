<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        h2,
        h3 {
            margin: 5px 0;
        }

        .text {
            font-size: 13px;
        }

        .text-center {
            text-align: center;
        }

        .line-title {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }

        .bg {
            background-color: #CCC;
        }

        .text2 {
            font-size: 14px;
        }

        .text3 {
            font-size: 10px;
        }

        .mt {
            margin-top: 20px;
        }

        .div {
            margin-top: 10px;
        }
    </style>


</head>

<body>
    <!-- <img src="<?= $logo; ?>"  height="100px">
    <h4 style="text-align: center;">INVOICE</h4>
    <h5 style="text-align: center;">BALI PRIORITY APOTEK</h5> -->

    <table width="100%" border="0">
        <tr>
            <td style="width: 30%;"><img src="<?= $logo; ?>" height="80px" class="logo"></td>
            <td>
                <h2 style="text-align: center;">INVOICE</h2>
                <h4 style="text-align: center;">BALI PRIORITY APOTEK</h4>
            </td>
        </tr>
    </table>
    <hr class="line-title" style="margin-top: 15px;">
    <!-- Data Pasien -->
    <div class="col">
        <table width="100%" align="center">
            <tr class="text2">
                <td style="width: 30%;">Kode Invoice</td>
                <td style="width: 3%;">:</td>
                <td><?= $invoice['nomor_invoice'] ?></td>

            </tr>
            <tr class="text2">
                <td style="width: 30%;">No Rekam Medis</td>
                <td style="width: 3%;">:</td>
                <td><?= $invoice['no_rekam_medis'] ?></td>

            </tr>
            <tr class="text2">
                <td style="width: 30%;">Nama Pasien</td>
                <td style="width: 3%;">:</td>
                <td><?= $invoice['nama_pasien'] ?></td>
            </tr>
        </table>
        <table width="100%">
            <tr class="text2">
                <td style="width: 30%;">Tanggal Invoice</td>
                <td style="width: 3%;">:</td>
                <td><?= $tanggal_invoice ?></td>
            </tr>
            <tr class="text2">

                <td style="width: 30%;">Dokter</td>
                <td style="width: 3%;">:</td>
                <td><?= $invoice['nama_dokter'] ?></td>
            </tr>
        </table>
    </div>

    <div class="div"></div>
    <!-- Invoice  -->
    <table border="1" width="100%">
        <tr class="text">
            <td style="width: 2%;" class="text-center">No</td>
            <td style="width: 43%;" class="text-center">Tindakan</td>
            <td style="width: 10%;" class="text-center">Diskon</td>
            <td style="width: 12%;" class="text-center">Harga</td>
        </tr>
        <tr class="text">
            <td class="text-center">1</td>
            <td>&nbsp;<?= $invoice['nama_tindakan1'] ?></td>
            <td class="text-center">
                <?= $invoice['diskon1'] ?>%</td>
            <td class="text-center"><?= $invoice['harga1'] ?></td>
        </tr>
        <tr class="text">
            <td class="text-center">2</td>
            <td>&nbsp;<?= $invoice['nama_tindakan2'] ?></td>
            <td class="text-center"><?= $invoice['diskon2'] ?>%</td>
            <td class="text-center"><?= $invoice['harga2'] ?></td>
        </tr>
        <tr class="text">
            <td class="text-center">3</td>
            <td>&nbsp;<?= $invoice['nama_tindakan3'] ?></td>
            <td class="text-center"><?= $invoice['diskon3'] ?>%</td>
            <td class="text-center"><?= $invoice['harga3'] ?></td>
        </tr>
        <tr class="text">
            <td class="text-center">4</td>
            <td>&nbsp;<?= $invoice['nama_tindakan4'] ?></td>
            <td class="text-center"><?= $invoice['diskon4'] ?>%</td>
            <td class="text-center"><?= $invoice['harga4'] ?></td>
        </tr>
        <tr class="text">
            <td class="text-center">3</td>
            <td>&nbsp;<?= $invoice['nama_tindakan5'] ?></td>
            <td class="text-center"><?= $invoice['diskon5'] ?>%</td>
            <td class="text-center"><?= $invoice['harga5'] ?></td>
        </tr>
    </table>

    <!-- Total -->
    <table border="1" width="100%">
        <tr class="text-center bg text">
            <td style="width: 63%;">
                Total Tindakan
            </td>
            <td style="width: 29%;">
                <?= $total_tindakan = $invoice['harga1'] + $invoice['harga2'] + $invoice['harga3'] + $invoice['harga4'] + $invoice['harga5'] ?>
            </td>
        </tr>
    </table>
    <div class="div"></div>

    <!-- <br> -->
    <!-- Obat -->
    <table border="1" width="100%">
        <tr class="text">
            <td style="width: 2%;" class="text-center">No</td>
            <td style="width: 40%;" class="text-center">Nama Obat</td>
            <td style="width: 10%;" class="text-center">Harga</td>
            <td style="width: 10%;" class="text-center">Jumlah</td>
            <td style="width: 15%;" class="text-center">Total</td>
        </tr>
        <tr class="text">
            <td class="text-center">1</td>
            <td>&nbsp;<?= $invoice['nama_obat'] ?></td>
            <td class="text-center"><?= $invoice['harga_obat'] ?></td>
            <td class="text-center"><?= $invoice['jumlah_obat'] ?></td>
            <td class="text-center"><?= $invoice['harga_obat'] * $invoice['jumlah_obat'] ?></td>
        </tr>
        <tr class="text">
            <td class="text-center">2</td>
            <td>&nbsp;<?= $invoice['nama_obat2'] ?></td>
            <td class="text-center"><?= $invoice['harga_obat2'] ?></td>
            <td class="text-center"><?= $invoice['jumlah_obat2'] ?></td>
            <td class="text-center"><?= $invoice['harga_obat2'] * $invoice['jumlah_obat2'] ?></td>
        </tr>
        <tr class="text">
            <td class="text-center">3</td>
            <td>&nbsp;<?= $invoice['nama_obat3'] ?></td>
            <td class="text-center"><?= $invoice['harga_obat3'] ?></td>
            <td class="text-center"><?= $invoice['jumlah_obat3'] ?></td>
            <td class="text-center"><?= $invoice['harga_obat3'] * $invoice['jumlah_obat3'] ?></td>
        </tr>
        <tr class="text">
            <td class="text-center">4</td>
            <td>&nbsp;<?= $invoice['nama_obat4'] ?></td>
            <td class="text-center"><?= $invoice['harga_obat4'] ?></td>
            <td class="text-center"><?= $invoice['jumlah_obat4'] ?></td>
            <td class="text-center"><?= $invoice['harga_obat4'] * $invoice['jumlah_obat4'] ?></td>
        </tr>
        <tr class="text">
            <td class="text-center">5</td>
            <td>&nbsp;<?= $invoice['nama_obat5'] ?></td>
            <td class="text-center"><?= $invoice['harga_obat5'] ?></td>
            <td class="text-center"><?= $invoice['jumlah_obat5'] ?></td>
            <td class="text-center"><?= $invoice['harga_obat5'] * $invoice['jumlah_obat5'] ?></td>
        </tr>

    </table>
    <!-- total obat -->
    <table border="1" width="100%">
        <tr class="text-center bg text">
            <td style="width: 51%;">
                Total Obat
            </td>
            <td style="width: 40%;">
                <?php
                $obat1 = $invoice['harga_obat'] * $invoice['jumlah_obat'];
                $obat2 = $invoice['harga_obat2'] * $invoice['jumlah_obat2'];
                $obat3 = $invoice['harga_obat3'] * $invoice['jumlah_obat3'];
                $obat4 = $invoice['harga_obat4'] * $invoice['jumlah_obat4'];
                $obat5 = $invoice['harga_obat5'] * $invoice['jumlah_obat5'];

                $total_obat = $obat1 + $obat2 + $obat3 + $obat4 + $obat5;
                echo $total_obat;
                ?>
            </td>
        </tr>
    </table>
    <!-- <br> -->

    <!-- total keseluruhan -->
    <div class="div"></div>
    <table border="1" width="100%">
        <tr class="text-center bg text">
            <td style="width: 100%;">
                Total Keseluruhan
            </td>
        </tr>
    </table>

    <table border="1" width="100%">
        <tr class="text-center text">
            <td style="width: 65%;"> Tindakan + Obat</td>
            <td style="width: 35%;">
                <?= $total_tindakan + $total_obat; ?>
            </td>
        </tr>
    </table>
    <table border="1" width="100%">
        <tr class="text-center text">
            <td style="width: 65%;"> Pajak <?= $invoice['pajak'] ?></td>
            <td style="width: 35%;">
                <?= $invoice['total']; ?>
            </td>
        </tr>
    </table>


    <!-- terima kasih -->
    <!-- <br> -->
    <table width="100%">
        <tr class="text-center text3">
            <td>
                Terima Kasih!
            </td>
        </tr>
        <!-- <tr class="text-center text2">
            <td>
                ~~~Dicetak~~~
            </td>
        </tr> -->

        <tr class="text-center text3">
            <td>
                dicetak : <?= $tanggal ?>
            </td>
        </tr>
    </table>

</body>

</html>