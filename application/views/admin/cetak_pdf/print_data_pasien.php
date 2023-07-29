<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Record Pasien</title>
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
    <H1>Data Record Pasien</H1>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>
                    No. Rekaman Medis
                </th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>No Tlp</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($all_pasien as $row) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row['no_rm'] ?></td>
                    <td><?= $row['nik'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['tanggal_lahir'] ?></td>
                    <td><?= $row['umur'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['no_tlp'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <table border="1" width="100%">
        <tr>
            <td style="width: 71%;">Total Keseluruhan</td>
            <td style="width: 29%;"><?=$total?> Pasien</td>
        </tr>
    </table>
</body>

</html>