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
                <a class="flex items-center p-3 mx-2 text-gray-600 hover:bg-gray-200 rounded-lg" href="{{ route('dashboard.pengguna') }}">
                    <i class="fas fa-users mr-3"></i> Pengguna
                </a>
                <a class="flex items-center p-3 mt-2 mx-2 text-gray-600 hover:bg-gray-200 rounded-lg" href="{{ route('dashboard.produk') }}">
                    <i class="fas fa-box mr-3"></i> Produk
                </a>
            </nav>

            <!-- User Profile and Logout -->
            <div class="absolute bottom-0 w-full p-6">
                <div class="flex items-center p-3 bg-gray-100 rounded-lg">
                    <img alt="User  profile picture" class="w-10 h-10 rounded-full" src="{{ $pengguna['gambar_qris'] ?? 'https://storage.googleapis.com/a1aa/image/6VVIR5UA20o0OZ0LZk9YjLHn0D2xEyoHJdmoEi38vZSAW0fJA.jpg' }}" />
                    <span class="ml-3 text-gray-700">Sinta Haidar Alamaa</span>
                </div>
                <a class="flex items-center p-3 mt-2 text-red-600 hover:bg-red-100 rounded-lg" href="#">
                    <i class="fas fa-sign-out-alt mr-3"></i> Keluar
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <div class="flex items-center mb-6">
                <i class="fas fa-arrow-left text-xl text-gray-600 mr-3"></i>
                <h2 class="text-2xl font-semibold text-gray-700">Detail Pengguna</h2>
            </div>
            <div class="grid grid-cols-3 gap-6">
                <!-- Info Akun -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Info Akun</h3>
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-600 mb-2">Username</label>
                            <input class="w-full p-2 border border-gray-300 rounded" type="text" value="{{ $pengguna['username'] }}"/>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 mb-2">Password</label>
                            <input class="w-full p-2 border border-gray-300 rounded" type="password" value="*****"/>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 mb-2">Email</label>
                            <input class="w-full p-2 border border-gray-300 rounded" type="email" value="{{ $pengguna['email'] }}"/>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 mb-2">Nomor Telepon</label>
                            <input class="w-full p-2 border border-gray-300 rounded" type="text" value="{{ $pengguna['nomor_telepon'] ?? 'N/A' }}"/>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 mb-2">Nama</label>
                            <input class="w-full p-2 border border-gray- 300 rounded" type="text" value="{{ $pengguna['nama'] }}"/>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 mb-2">Nama Toko</label>
                            <input class="w-full p-2 border border-gray-300 rounded" type="text" value="{{ $pengguna['nama_toko'] }}"/>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 mb-2">Alamat Toko</label>
                            <input class="w-full p-2 border border-gray-300 rounded" type="text" value="{{ $pengguna['alamat_toko'] }}"/>
                        </div>
                        <div class="flex justify-between">
                            <button class="px-4 py-2 bg-blue-600 text-white rounded" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- Data Produk and Data Pelanggan -->
                <div class="col-span-2">
                    <div class="flex justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-700">Data Produk</h3>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded">Edit</button>
                    </div>
                    <div class="flex justify-between mb-4">
                        <h3 class="text-xl font-semibold text-gray-700">Data Pelanggan</h3>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded">Edit</button>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Riwayat Transaksi</h3>
                    <table class="w-full text-left bg-white shadow-md rounded">
                        <thead>
                            <tr>
                                <th class="py-3 px-4">NO</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Produk</th>
                                <th class="py-3 px-4">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-3 px-4">1</td>
                                <td class="py-3 px-4">Transaksi berhasil</td>
                                <td class="py-3 px-4">Kode Makanan : KM0001, Nama Makanan : Oreoreo</td>
                                <td class="py-3 px-4">06/07/2024, 18:44:00</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3 px-4">2</td>
                                <td class="py-3 px-4">Transaksi berhasil</td>
                                <td class="py-3 px-4">Kode Makanan : KM0001, Nama Makanan : Oreoreo</td>
                                <td class="py-3 px-4">06/07/2024, 18:44:00</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3 px-4">3</td>
                                <td class="py-3 px-4">Transaksi berhasil</td>
                                <td class="py-3 px-4">Kode Makanan : KM0001, Nama Makanan : Oreoreo</td>
                                <td class="py-3 px-4">06/07/2024, 18:44:00</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3 px-4">4</td>
                                <td class="py-3 px-4">Transaksi berhasil</td>
                                <td class="py-3 px-4">Kode Makanan : KM0001, Nama Makanan : Oreoreo</td>
                                <td class="py-3 px-4">06/07/2024, 18:44:00</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3 px-4">5</td>
                                <td class="py-3 px-4">Transaksi berhasil</td>
                                <td class="py-3 px-4">Kode Makanan : KM0001, Nama Makanan : Oreoreo</td>
                                <td class="py-3 px-4">06/07/2024, 18:44:00</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3 px-4">6</td>
                                <td class="py-3 px-4">Transaksi berhasil</td>
                                <td class="py-3 px-4">Kode Makanan : KM0001, Nama Makanan : Oreoreo</td>
                                <td class="py-3 px-4">06/07/2024, 18:44:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>