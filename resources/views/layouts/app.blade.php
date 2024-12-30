<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasir')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #ffffff;
            height: 100vh;
            padding: 20px;
            border-right: 1px solid #e0e0e0;
            display: flex;
            flex-direction: column;
            width: 250px; /* Atur lebar sidebar sesuai kebutuhan */
        }

        .sidebar h2 {
            color: #007bff;
        }

        .sidebar .nav-link {
            color: #6c757d;
            font-weight: 500;
            margin-bottom: 10px;
            padding: 12px;
            border-radius: 5px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #007bff;
            background-color: #e9ecef;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .sidebar .profile {
            margin-top: auto;
            text-align: center;
        }

        .sidebar .profile img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }

        .sidebar .profile .name {
            font-weight: 500;
            margin-top: 10px;
        }

        .sidebar .logout {
            color: #dc3545;
            font-weight: 500;
            margin-top: 20px;
        }

        .content {
            padding: 20px;
        }

        .content .header {
            font-size: 24px;
            font-weight: 700;
            color: #007bff;
        }

        .content .date {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .table tbody tr {
            background-color: #ffffff;
        }

        #editSidebar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1050; /* Pastikan di atas elemen lain */
        }

        #editSidebar .btn-close {
            font-size: 1rem;
            padding: 0.5rem 1rem;
            color: #333;
        }
        #editSidebar .btn-close:hover {
            background-color: #f8f9fa;
            color: #000;
        }
        #overlay {
            background-color: rgba(0, 0, 0, 0.3); /* Warna gelap semi-transparan */
        }

        .sidebar .img {
            margin-bottom: 1rem;
        }

        .sidebar .img img {
            width: 100%; /* Mengatur lebar gambar agar responsif */
            height: auto; /* Mengatur tinggi gambar secara otomatis */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Menambahkan box shadow */
            border-radius: 8px; /* Melengkungkan sudut gambar */
        }
    </style>
</head>

<body class="bg-light">
    <div class="d-flex min-vh-100">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="img mb-4">
                <img src="https://firebasestorage.googleapis.com/v0/b/aplikasir-database.appspot.com/o/logo.png?alt=media&token=4d2daf93-19b2-40cd-8a23-bdd3b00bd36b" alt="logo">
            </div>
            <nav class="mt-4">
                <a href="{{ route('dashboard') }}" class="nav-link @if(request()->routeIs('dashboard')) active @endif">
                    <i class="fas fa-home"></i> Beranda
                </a>
                <a href="{{ route('dashboard.pengguna') }}" 
                class="nav-link @if(
                    request()->routeIs('dashboard.pengguna') || 
                    request()->routeIs('dashboard.userdetail') || 
                    request()->routeIs('dashboard.productuser') || 
                    request()->routeIs('dashboard.customeruser')) active @endif">
                    <i class="fas fa-users"></i> Pengguna
                </a>
                <a href="{{ route('dashboard.produk') }}" class="nav-link @if(request()->routeIs('dashboard.produk')) active @endif">
                    <i class="fas fa-box"></i> Produk
                </a>
            </nav>
            <div class="profile mt-auto text-center">
                <div class="d-flex align-items-center p-2 bg-light rounded">
                    <img src="https://storage.googleapis.com/a1aa/image/6VVIR5UA20o0OZ0LZk9YjLHn0D2xEyoHJdmoEi38vZSAW0fJA.jpg" alt="User" class="rounded-circle me-2">
                    <span class="text-dark">Sinta Haidar</span>
                </div>
                <a href="#" class="nav-link logout">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-fill p-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
