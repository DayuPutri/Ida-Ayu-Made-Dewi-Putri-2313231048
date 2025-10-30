<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Manajemen Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Dashboard</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="/user">User</a></li>
                <li class="nav-item"><a class="nav-link" href="/produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="/distributor">Distributor</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>