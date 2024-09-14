<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px; /* Set appropriate size for logo */
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }
        .header p {
            margin: 5px 0;
            font-size: 16px;
        }
        .nota-section {
            margin-bottom: 20px;
        }
        .nota-section h2 {
            margin-top: 0;
            font-size: 22px;
            font-weight: bold;
        }
        .nota-item {
            display: flex;
            border-bottom: 2px solid black;
            padding: 15px 0;
            gap: 20px;
        }
        .nota-item:last-child {
            border-bottom: none;
        }
        .nota-item > div {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .nota-item > div:nth-child(1) {
            background-color: #f1f1f1;
        }
        .nota-item > div:nth-child(2) {
            background-color: #ffffff;
        }
        .nota-item div span {
            font-weight: bold;
        }
        .total-section {
            text-align: right;
            margin-top: 20px;
        }
        .total-section h3 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/amitie.jpg" alt="logo">
            <h1>Data Pelanggan: {{ $pelanggans->nama_pelanggan }}</h1>
            <p>Alamat: {{ $pelanggans->alamat }}</p>
            <p>Tanggal: {{ $pelanggans->tanggal }}</p>
        </div>

        <div class="nota-section">
            <h2>Daftar Nota</h2>
            @foreach ($pelanggans->notes as $key => $note)
            <div class="nota-item">
                <!-- kiri -->
                <div>
                    <div><span>Proses:</span> {{ $note->proses }}</div>
                    <div><span>Atas Nama:</span> {{ $note->atas_nama }}</div>
                    <div><span>Kendaraan:</span> {{ $note->kendaraan }}</div>
                    <div><span>No Polisi:</span> {{ $note->no_polisi }}</div>
                    <div><span>Keterangan:</span> {{ $note->keterangan }}</div>
                </div>
                <!-- kanan -->
                <div>
                    <div><span>STNK Resmi:</span> Rp {{ number_format($note->stnk_resmi, 0, ',', '.') }}</div>
                    <div><span>Jasa:</span> Rp {{ number_format($note->jasa, 0, ',', '.') }}</div>
                    <div><span>Lain-lain:</span> Rp {{ number_format($note->lain_lain, 0, ',', '.') }}</div>
                    <div><span>Total:</span> Rp {{ number_format($note->total, 0, ',', '.') }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="total-section">
            <h3>Jumlah Keseluruhan: Rp {{ number_format($pelanggans->notes->sum('total'), 0, ',', '.') }}</h3>
        </div>
    </div>
</body>
</html>
