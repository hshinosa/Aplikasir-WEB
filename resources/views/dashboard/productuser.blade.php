@extends('layouts.app')

@section('content')
<div class="flex-fill p-4">
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('dashboard.userdetail', ['id' => $pengguna['id']]) }}" class="text-gray-600 me-3">
            <i class="fas fa-arrow-left text-xl" style= "font-size: 25px;"></i>
        </a>
        <h2 class="text-primary fw-bold">Produk</h2>
    </div>
    <div class="bg-white p-4 rounded shadow-sm">
        <div class="table-responsive">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kode Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ $product['gambar_produk'] }}" alt="Gambar Produk" width="50" height="50"></td>
                        <td>{{ $product['nama_produk'] }}</td>
                        <td>{{ $product['kode_produk'] }}</td>
                        <td>{{ number_format($product['harga_jual'], 0, ',', '.') }}</td>
                        <td>{{ $product['jumlah_produk'] }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="javascript:void(0);" class="text-blue-600" onclick="openSidebar({{ json_encode($product) }}, {{ $pengguna['id'] }})">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('dashboard.productdestroy', ['id' => $pengguna['id'], 'produkId' => $product['id']]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger bg-transparent border-none p-0">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <nav aria-label="Pagination">
            {{ $products->links('pagination::bootstrap-4') }}
        </nav>
    </div>
</div>

<!-- Sidebar Edit -->
<div id="overlay" style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5); visibility: hidden; opacity: 0; transition: opacity 0.3s;"></div>

<div id="editSidebar" class="position-fixed top-0 end-0 bg-white vh-100 p-4 shadow-lg" style="width: 400px; transform: translateX(100%); transition: transform 0.3s;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Edit Produk</h3>
        <button class="btn btn-light btn-sm" onclick="closeSidebar()">Tutup</button>
    </div>
    <form id="editForm" action="#" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" id="editIdProduk" name="id_produk">
        <input type="hidden" id="editIdPengguna" name="id_pengguna">
        
        <!-- Gambar Produk -->
        <div class="mb-3">
            <label class="form-label">Gambar Produk</label>
            <!-- Image preview -->
            <div class="mb-2">
                <img id="editImage" src="" alt="Gambar Produk" class="img-fluid" style="max-width: 100px;">
            </div>
            <!-- Input to change the image -->
            <input id="editGambarProduk" class="form-control" type="text" name="gambar_produk" placeholder="Masukkan URL Gambar">
        </div>

        <!-- Nama Produk -->
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input id="editNamaProduk" class="form-control" type="text" name="nama_produk" required>
        </div>

        <!-- Kode Produk -->
        <div class="mb-3">
            <label class="form-label">Kode Produk</label>
            <input id="editKodeProduk" class="form-control" type="text" name="kode_produk" required>
        </div>

        <!-- Stok -->
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input id="editStok" class="form-control" type="number" name="jumlah_produk" required>
        </div>

        <!-- Harga Modal -->
        <div class="mb-3">
            <label class="form-label">Harga Modal</label>
            <input id="editHargaModal" class="form-control" type="number" name="harga_modal">
        </div>

        <!-- Harga Jual -->
        <div class="mb-3">
            <label class="form-label">Harga Jual</label>
            <input id="editHargaJual" class="form-control" type="number" name="harga_jual" required>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
</div>

<script>
    function openSidebar(product, penggunaId) {
        const sidebar = document.getElementById('editSidebar');
        const overlay = document.getElementById('overlay');
        const imageElement = document.getElementById('editImage');
        imageElement.src = product.gambar_produk;
        // Set the form action URL based on the product ID        
        document.getElementById('editGambarProduk').value = product.gambar_produk;
        document.getElementById('editForm').action = `/dashboard/pengguna/${penggunaId}/produk/${product.id}`;
        document.getElementById('editIdProduk').value = product.id;
        document.getElementById('editIdPengguna').value = penggunaId;
        document.getElementById('editNamaProduk').value = product.nama_produk;
        document.getElementById('editKodeProduk').value = product.kode_produk;
        document.getElementById('editHargaModal').value = product.harga_modal;
        document.getElementById('editHargaJual').value = product.harga_jual;
        document.getElementById('editStok').value = product.jumlah_produk;

        // Show the sidebar and overlay
        sidebar.style.transform = 'translateX(0)';
        overlay.style.opacity = '1';
        overlay.style.visibility = 'visible';
    }

    function closeSidebar() {
        const sidebar = document.getElementById('editSidebar');
        const overlay = document.getElementById('overlay');

        sidebar.style.transform = 'translateX(100%)';
        overlay.style.opacity = '0';
        overlay.style.visibility = 'hidden';
    }

    document.getElementById('overlay').addEventListener('click', closeSidebar);
</script>
@endsection
