<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini Market</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    @livewireStyles
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-light">

        <div class="container-fluid">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/barang') }}">Manajemen Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/transaksi') }}">Transaksi</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        SELAMAT DATANG
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">APLIKASI KASIR V.0.13</h4>
                        @isset($slot)
                            @if ($slot)
                                {{ $slot }}
                            @endif
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>
