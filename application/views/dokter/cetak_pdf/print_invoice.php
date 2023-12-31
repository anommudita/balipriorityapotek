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
            font-size: 11px;
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
    </style>


</head>

<body>
    <h2 style="text-align: center;">INVOICE</h2>
    <h3 style="text-align: center;">BALI PRIORITY APOTEK</h3>

    <hr class="line-title">
    <div class="col">
        <table width="100%" align="center">
            <tr class="text">
                <td style="width: 15%;">Kode Invoice</td>
                <td style="width: 1%;">:</td>
                <td><?= $invoice['nomor_invoice'] ?></td>
                <td style="width: 15%;">Nama Pasien</td>
                <td style="width: 1%;">:</td>
                <td><?= $invoice['nama_pasien'] ?></td>
            </tr>
            <tr class="text">
                <td>Tanggal Invoice</td>
                <td>:</td>
                <td><?= $tanggal ?></td>
                <td>Dokter</td>
                <td>:</td>
                <td><?= $invoice['nama_dokter'] ?></td>
            </tr>
        </table>
    </div>
    <table border="1" width="100%">
        <tr>
            <td style="width: 2%;" class="text-center">No</td>
            <td style="width: 40%;" class="text-center">Tindakan</td>
            <td style="width: 10%;" class="text-center">Diskon</td>
            <td style="width: 15%;" class="text-center">Harga</td>
        </tr>
        <tr>
            <td class="text-center">1</td>
            <td><?= $invoice['nama_tindakan1'] ?></td>
            <td class="text-center">
                <?= $invoice['diskon1'] ?>%</td>
            <td class="text-center"><?= $invoice['harga1'] ?></td>
        </tr>
        <tr>
            <td class="text-center">2</td>
            <td><?= $invoice['nama_tindakan2'] ?></td>
            <td class="text-center"><?= $invoice['diskon2'] ?>%</td>
            <td class="text-center"><?= $invoice['harga2'] ?></td>
        </tr>
        <tr>
            <td class="text-center">3</td>
            <td><?= $invoice['nama_tindakan3'] ?></td>
            <td class="text-center"><?= $invoice['diskon3'] ?>%</td>
            <td class="text-center"><?= $invoice['harga3'] ?></td>
        </tr>
    </table>
    <table border="1" width="100%">
        <tr class="text-center">
            <td style="width: 64%;">
                Total
            </td>
            <td style="width: 35%;">
                <?= $invoice['harga1'] + $invoice['harga2'] + $invoice['harga3'] ?>
            </td>
        </tr>
    </table>

    <br>
    <table border="1" width="100%">
        <tr>
            <td style="width: 2%;" class="text-center">No</td>
            <td style="width: 25%;" class="text-center">Nama Obat</td>
            <td style="width: 20%;" class="text-center">Harga</td>
            <td style="width: 10%;" class="text-center">Jumlah</td>
            <td style="width: 20%;" class="text-center">Total</td>
        </tr>
        <tr>
            <td class="text-center">1</td>
            <td><?= $invoice['nama_obat'] ?></td>
            <td class="text-center"><?= $invoice['harga_obat'] ?></td>
            <td class="text-center"><?= $invoice['jumlah_obat'] ?></td>
            <td class="text-center"><?= $invoice['harga_obat'] * $invoice['jumlah_obat'] ?></td>
    </table>
    <br>
    <table border="1" width="100%">
        <tr class="text-center bg">
            <td style="width: 100%;">
                Total Keseluruhan
            </td>
        </tr>
    </table>
    <table border="1" width="100%">
        <tr class="text-center">
            <td style="width: 65%;"> Tindakan + Obat</td>
            <td style="width: 35%;">
                <?= $invoice['harga1'] + $invoice['harga2'] + $invoice['harga3'] + ($invoice['harga_obat'] * $invoice['jumlah_obat']) ?>
            </td>
        </tr>
    </table>
    <table border="1" width="100%">
        <tr class="text-center">
            <td style="width: 65%;"> Pajak <?= $invoice['pajak'] ?>%</td>
            <td style="width: 35%;">
                <?= $invoice['total']; ?>
            </td>
        </tr>
    </table>

    <br>
    <table>
        <tr>
            <td>
                Terima Kasih!
            </td>
        </tr>
    </table>



</body>

</html>