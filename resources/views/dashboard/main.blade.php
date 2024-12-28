<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Aplikasir</title>
    
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
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
                <a class="flex items-center p-3 mx-2 text-blue-600 bg-blue-100 rounded-lg shadow-lg" href="{{ route('dashboard') }}">
                    <i class="fas fa-home mr-3"></i> Beranda
                </a>
                <a class="flex items-center p-3 mt-2 mx-2 text-gray-600 hover:bg-gray-200 rounded-lg" href="{{ route('dashboard.pengguna') }}">
                    <i class="fas fa-users mr-3"></i> Pengguna
                </a>
                <a class="flex items-center p-3 mt-2 mx-2 text-gray-600 hover:bg-gray-200 rounded-lg" href="{{ route('dashboard.produk') }}">
                    <i class="fas fa-box mr-3"></i> Produk
                </a>
            </nav>
            
            <!-- User Profile and Logout -->
            <div class="absolute bottom-0 w-full p-6">
                <div class="flex items-center p-3 bg-gray-100 rounded-lg">
                    <img alt="User profile picture" class="w-10 h-10 rounded-full" src="https://storage.googleapis.com/a1aa/image/6VVIR5UA20o0OZ0LZk9YjLHn0D2xEyoHJdmoEi38vZSAW0fJA.jpg" />
                    <span class="ml-3 text-gray-700">Sinta Haidar</span>
                </div>
                <a class="flex items-center p-3 mt-2 text-red-600 hover:bg-red-100 rounded-lg" href="#">
                    <i class="fas fa-sign-out-alt mr-3"></i> Keluar
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h2 class="text-2xl font-bold text-blue-600">Selamat Datang, Sinta Haidar Alama!</h2>
            <p class="text-gray-500">Senin 21 Oktober 2024</p>
            
            <!-- Dashboard Cards -->
            <div class="grid grid-cols-4 gap-4 mt-6">
                <!-- Card: Pengguna Harian -->
                <div class="flex items-center p-4 bg-white shadow-md rounded-lg">
                    <i class="fas fa-user text-blue-600 mr-3"></i>
                    <div>
                        <span class="text-gray-500">Pengguna Harian</span>
                        <span class="block text-2xl font-bold">{{ $totalUsers }}</span>
                    </div>
                </div>

                <!-- Repeatable Cards (adjusted for dynamic data) -->
                <div class="flex items-center p-4 bg-white shadow-md rounded-lg">
                    <i class="fas fa-user text-blue-600 mr-3"></i>
                    <div>
                        <span class="text-gray-500">Pengguna Harian</span>
                        <span class="block text-2xl font-bold">{{ $totalUsers }}</span>
                    </div>
                </div>

                <div class="flex items-center p-4 bg-white shadow-md rounded-lg">
                    <i class="fas fa-user text-blue-600 mr-3"></i>
                    <div>
                        <span class="text-gray-500">Pengguna Harian</span>
                        <span class="block text-2xl font-bold">{{ $totalUsers }}</span>
                    </div>
                </div>

                <div class="flex items-center p-4 bg-white shadow-md rounded-lg">
                    <i class="fas fa-user text-blue-600 mr-3"></i>
                    <div>
                        <span class="text-gray-500">Pengguna Harian</span>
                        <span class="block text-2xl font-bold">{{ $totalUsers }}</span>
                    </div>
                </div>
            </div>

            <!-- Activity History -->
            <div class="mt-6 bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-bold text-gray-700">Riwayat Kegiatan</h3>
                <table class="w-full mt-4 text-left">
                    <thead>
                        <tr class="text-gray-500">
                            <th class="py-2 w-1/12">NO</th>
                            <th class="py-2 w-2/12">Pengguna</th>
                            <th class="py-2 w-3/12">Aktivitas</th>
                            <th class="py-2 w-4/12">Keterangan</th>
                            <th class="py-2 w-2/12">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Repeatable Row for Activity -->
                        <tr class="border-t">
                            <td class="py-2">1</td>
                            <td class="py-2">Admin</td>
                            <td class="py-2">Menambahkan data pengguna baru</td>
                            <td class="py-2">Kode Makanan: KM0001, Nama Makanan: Oreoreo, Informasi Gizi...</td>
                            <td class="py-2">06/07/2024, 18:44:00</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-2">2</td>
                            <td class="py-2">Admin</td>
                            <td class="py-2">Menambahkan data pengguna baru</td>
                            <td class="py-2">Kode Makanan: KM0001, Nama Makanan: Oreoreo, Informasi Gizi...</td>
                            <td class="py-2">06/07/2024, 18:44:00</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-2">3</td>
                            <td class="py-2">Admin</td>
                            <td class="py-2">Menambahkan data pengguna baru</td>
                            <td class="py-2">Kode Makanan: KM0001, Nama Makanan: Oreoreo, Informasi Gizi...</td>
                            <td class="py-2">06/07/2024, 18:44:00</td>
                        </tr>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-4 flex justify-end">
                    <a class="px-3 py-1 border rounded-md text-blue-600 border-blue-600" href="#">1</a>
                    <a class="px-3 py-1 border rounded-md text-gray-600 border-gray-300 ml-2" href="#">2</a>
                    <a class="px-3 py-1 border rounded-md text-gray-600 border-gray-300 ml-2" href="#">...</a>
                    <a class="px-3 py-1 border rounded-md text-gray-600 border-gray-300 ml-2" href="#">5</a>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
