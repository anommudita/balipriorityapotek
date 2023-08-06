<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Invoice</title>
    <style>
        table,
        td,
        th {
            border: 1px solid #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 2px;
        }

        th {
            background-color: #CCC;
            font-size: 12px;
        }

        td {
            font-size: 11px;
            text-align: center;
        }
    </style>

    <!-- logo di title -->
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/assets/img/logobalipriorityapotek.png">

</head>

<body>
    <H1>Data Invoice</H1>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>
                    Nomor Invoice
                </th>
                <th>No Rekam Medis</th>
                <th>Nama</th>
                <th>Dokter</th>
                <th>Tanggal</th>
                <th style="width: 5%;">Biaya Tindakan</th>
                <th>Biaya Obat</th>
                <th>Pajak</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1;
            $seluruh_total = 0; ?>
            <?php foreach ($all_invoice as $row) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row['nomor_invoice'] ?></td>
                    <td><?= $row['no_rekam_medis'] ?></td>
                    <td><?= $row['nama_pasien'] ?></td>
                    <td><?= $row['nama_dokter'] ?></td>
                    <td><?= $row['date_created'] ?></td>
                    <td><?= $row['harga1'] + $row['harga2'] + $row['harga3'] + $row['harga4'] + $row['harga5'] ?></td>
                    <td><?= $row['harga_obat'] + $row['harga_obat2'] + $row['harga_obat3'] + $row['harga_obat4'] + $row['harga_obat5'] ?></td>
                    <td><?= $row['pajak'] ?></td>
                    <td><?= $row['total'] ?></td>
                </tr>
                <?php $seluruh_total += $row['total']; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <table border="1" width="100%">
        <tr>
            <td style="width: 67%;">Total Keseluruhan</td>
            <td style="width: 33%;"><?= $seluruh_total; ?></td>
        </tr>
    </table>
</body>

</html>