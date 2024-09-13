<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Data Pelanggan: {{ $pelanggans->nama_pelanggan }}</h1>
    <p>Alamat: {{ $pelanggans->alamat }}</p>
    <p>Tanggal: {{ $pelanggans->tanggal }}</p>

    <h2>Daftar Nota</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Proses</th>
                <th>Atas Nama</th>
                <th>Kendaraan</th>
                <th>No Polisi</th>
                <th>Keterangan</th>
                <th>STNK Resmi</th>
                <th>Jasa</th>
                <th>Lain-lain</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggans->notes as $key => $note)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $note->proses }}</td>
                <td>{{ $note->atas_nama }}</td>
                <td>{{ $note->kendaraan }}</td>
                <td>{{ $note->no_polisi }}</td>
                <td>{{ $note->keterangan }}</td>
                <td>{{ $note->stnk_resmi }}</td>
                <td>{{ $note->jasa }}</td>
                <td>{{ $note->lain_lain }}</td>
                <td>Rp {{ number_format($note->total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
