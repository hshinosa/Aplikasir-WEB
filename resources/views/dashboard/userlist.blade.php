<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Aplikasir</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md relative">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-blue-600">Aplikasir</h1>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="mt-6">
                <a class="flex items-center p-3 mt-2 mx-2 text-gray-600 hover:bg-gray-200 rounded-lg" href="{{ route('dashboard') }}">
                    <i class="fas fa-home mr-3"></i> Beranda
                </a>
                <a class="flex items-center p-3 mx-2 text-blue-600 bg-blue-100 rounded-lg shadow-lg" href="{{ route('dashboard.pengguna') }}">
                    <i class="fas fa-users mr-3"></i> Pengguna
                </a>
                <a class="flex items-center p-3 mt-2 mx-2 text-gray-600 hover:bg-gray-200 rounded-lg" href="{{ route('dashboard.produk') }}">
                    <i class="fas fa-box mr-3"></i> Produk
                </a>
            </nav>

            <!-- User Profile and Logout -->
            <div class="absolute bottom-0 w-full p-6">
                <div class="flex items-center p-3 bg-gray-100 rounded-lg">
                    <img alt="User profile picture" class="w-10 h-10 rounded-full" src="{{ auth()->user()->profile_picture ?? 'https://storage.googleapis.com/a1aa/image/6VVIR5UA20o0OZ0LZk9YjLHn0D2xEyoHJdmoEi38vZSAW0fJA.jpg' }}" />
                    <span class="ml-3 text-gray-700">{{ auth()->user()->name ?? 'Nama Pengguna' }}</span>
                </div>
                <a class="flex items-center p-3 mt-2 text-red-600 hover:bg-red-100 rounded-lg" href="#">
                    <i class="fas fa-sign-out-alt mr-3"></i> Keluar
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">Pengguna</h2>
            </div>
            <div class="mt-6 bg-white p-6 rounded-md shadow-md">
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th class="pb-3">NO</th>
                            <th class="pb-3">Nama</th>
                            <th class="pb-3">Username</th>
                            <th class="pb-3">No. Telp</th>
                            <th class="pb-3">Email</th>
                            <th class="pb-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paginatedPengguna as $user)
                        <tr class="border-t">
                            <td class="py-3">{{ $loop->iteration }}</td> <!-- Menampilkan urutan nomor berdasarkan posisi -->
                            <td class="py-3">{{ $user['nama'] }}</td>
                            <td class="py-3">{{ $user['username'] }}</td>
                            <td class="py-3">{{ $user['nomor_telepon'] ?? 'N/A' }}</td>
                            <td class="py-3">{{ $user['email'] }}</td>
                            <td class="py-3">
                                <!-- Link edit tetap menggunakan ID pengguna -->
                                <a class="text-blue-600" href="{{ route('dashboard.userdetail', $user['id']) }}"><i class="fas fa-edit"></i></a>
                                <a class="text-red-600 ml-3" href="#"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination Links -->
                <div class="mt-4 flex justify-end">
                    {{ $paginatedPengguna->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
