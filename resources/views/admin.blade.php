
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	

    <title>Strategic Business Leaders Forum</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500&family=Sen:wght@400;700;800&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&family=Sen:wght@400;700;800&display=swap');
        @import url('https://fonts.cdnfonts.com/css/avenir');
    </style>

    <!-- aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

            <!-- bootstrap -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<title>Laravel</title>

<!-- Custom fonts for this template -->
<link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template -->
<link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  
</head>

    <body class="antialiased">
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h1 class="h3">Data Pelanggan: {{ $pelanggans->nama_pelanggan }}</h1>
                    <p class="mb-1">Alamat: {{ $pelanggans->alamat }}</p>
                    <p>Tanggal: {{ $pelanggans->tanggal }}</p>
                </div>

                <h2 class="h4 mb-3">Daftar Nota</h2>
                @foreach ($pelanggans->notes as $key => $note)
                <div class="row border-bottom pb-3 mb-3 nota-item">
                    <!-- kiri -->
                    <div class="col-6">
                        <div><span>Proses:</span> {{ $note->proses }}</div>
                        <div><span>Atas Nama:</span> {{ $note->atas_nama }}</div>
                        <div><span>Kendaraan:</span> {{ $note->kendaraan }}</div>
                        <div><span>No Polisi:</span> {{ $note->no_polisi }}</div>
                        <div><span>Keterangan:</span> {{ $note->keterangan }}</div>
                    </div>
                    <!-- kanan -->
                    <div class="col-6">
                        <div><span>STNK Resmi:</span> Rp {{ number_format($note->stnk_resmi, 0, ',', '.') }}</div>
                        <div><span>Jasa:</span> Rp {{ number_format($note->jasa, 0, ',', '.') }}</div>
                        <div><span>Lain-lain:</span> Rp {{ number_format($note->lain_lain, 0, ',', '.') }}</div>
                        <div><span>Total:</span> Rp {{ number_format($note->total, 0, ',', '.') }}</div>
                    </div>
                </div>
                @endforeach

                <div class="text-end mt-4">
                    <h3 class="h5">Jumlah Keseluruhan: Rp {{ number_format($pelanggans->notes->sum('total'), 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
    </div>



        
        
        <!-- Bootstrap core JavaScript-->
        <script src="/assets/vendor/jquery/jquery.min.js"></script>
        <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="/assets/js/demo/datatables-demo.js"></script>
        
        <script src="/js/app.js" type="text/javascript"></script>


      <!-- animation -->
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                once: true,
            });
        </script>
                
    </body>

</html>