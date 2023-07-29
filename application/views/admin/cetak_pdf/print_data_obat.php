<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Obat</title>
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
    <H1>Data Obat</H1>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>
                    Nama Obat
                </th>
                <th>Harga Obat</th>
                <th>Tanggal Input</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($obat as $row) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row['nama_obat'] ?></td>
                    <td><?= $row['harga'] ?></td>
                    <td><?= $row['date_created'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>


    </table>
</body>

</html>