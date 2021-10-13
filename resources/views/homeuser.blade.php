<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Dashboard</h3>
                </div>

                @foreach($pengguna as $pengguna)
                <div class="card-body">
                    <h5>Selamat datang di halaman dashboard antrian,</h5>
                    <h5>Nomor Antrian anda adalah <strong>{{ $pengguna -> id}}</strong></h5>
                    <a href="{{ route('logout') }}" class="btn btn-danger">Keluar</a>
                    <a href="nomor-antrian" class="btn btn-success">Lanjut Halaman Antrian</button></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>