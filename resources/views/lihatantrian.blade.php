<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Dashboard Klinik Hewan Kucing</h3>
                    <h6>Lihat Antrian</h6>
                </div>

                @foreach($pengguna as $pengguna)
                <div class="card-body">
                    <h5>Selamat datang di halaman dashboard antrian,</h5>
                    <h5>Nomor Antrian {{ $pengguna -> name }} adalah <strong>{{ $pengguna -> id}}</strong></h5>
                </div>
                @endforeach
                <a href="{{ route('landingpage') }}" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
</body>
</html>