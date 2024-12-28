<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Produk - Aplikasir</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-md relative">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-blue-600">Aplikasir</h1>
        </div>
        <nav class="mt-6">
            <a class="flex items-center p-3 mx-2 text-blue-600 bg-blue-100 rounded-lg shadow-lg" href="{{ route('dashboard') }}">
                <i class="fas fa-home mr-3"></i>Beranda
            </a>
            <a class="flex items-center p-3 mt-2 mx-2 text-gray-600 hover:bg-gray-200 rounded-lg" href="{{ route('dashboard.pengguna') }}">
                <i class="fas fa-users mr-3"></i>Pengguna
            </a>
            <a class="flex items-center p-3 mt-2 mx-2 text-gray-600 hover:bg-gray-200 rounded-lg" href="{{ route('dashboard.produk') }}">
                <i class="fas fa-box mr-3"></i>Produk
            </a>
        </nav>
    </div>
    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h2 class="text-2xl font-bold text-blue-600 mb-6">Produk</h2>
        <div class="mt-6 bg-white p-6 rounded-md shadow-md">
            <table class="w-full text-left">
                <thead>
                <tr>
                    <th class="pb-3">NO</th>
                    <th class="pb-3">Gambar</th>
                    <th class="pb-3">Nama Produk</th>
                    <th class="pb-3">Kode Produk</th>
                    <th class="pb-3">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($products) && $products->count() > 0)
                    @foreach ($products as $index => $product)
                        <tr class="border-t">
                            <td class="py-3">{{ $loop->iteration }}</td>
                            <td class="py-3">
                                <img alt="Product image" height="50" src="{{ $product['gambar_produk'] }}" width="50"/>
                            </td>
                            <td class="py-3">{{ $product['nama_produk'] }}</td>
                            <td class="py-3">{{ $product['kode_produk'] }}</td>
                            <td class="py-3">
                                <a class="text-blue-600" href="#">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="text-red-600 ml-3" href="#">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center py-3">Data produk tidak tersedia.</td>
                    </tr>
                @endif
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $products->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</div>
</body>
</html>
