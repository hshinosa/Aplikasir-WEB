@extends('layouts.app')

@section('content')
<!-- Main Content -->
<div class="flex-fill p-4">
<div class="d-flex align-items-center mb-4">
        <a href="{{ route('dashboard.pengguna') }}" class="text-decoration-none">
            <i class="fas fa-arrow-left text-xl text-gray-600 me-3" style= "font-size: 25px;"></i>
        </a>
        <h2 class="text-primary fw-semibold">Detail Pengguna</h2>
    </div>
    <div class="row">
        <!-- Info Akun -->
        <div class="col-md-4">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Info Akun</h3>
            <form action="{{ route('dashboard.penggunaupdate', $pengguna['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="role" value="pengguna">
                <div class="mb-3">
                    <label class="form-label text-gray-600">Nama</label>
                    <input class="form-control" type="text" name="nama" value="{{ $pengguna['nama'] }}" required />
                </div>
                <div class="mb-3">
                    <label class="form-label text-gray-600">Username</label>
                    <input class="form-control" type="text" name="username" value="{{ $pengguna['username'] }}" required />
                </div>
                <div class="mb-3">
                    <label class="form-label text-gray-600">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="****" />
                </div>
                <div class="mb-3">
                    <label class="form-label text-gray-600">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ $pengguna['email'] }}" required />
                </div>
                <div class="mb-3">
                    <label class="form-label text-gray-600">Nomor Telepon</label>
                    <input class="form-control" type="tel" name="nomor_telepon" value="{{ $pengguna['nomor_telepon'] ?? '' }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label text-gray-600">Nama Toko</label>
                    <input class="form-control" type="text" name="nama_toko" value="{{ $pengguna['nama_toko'] ?? '' }}" />
                </div>
                <div class="mb-3">
                    <label class="form-label text-gray-600">Alamat Toko</label>
                    <input class="form-control" type="text" name="alamat_toko" value="{{ $pengguna['alamat_toko'] ?? '' }}" />
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
        <!-- Data Produk and Data Pelanggan -->
        <div class="col-md-8">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="text-xl font-semibold text-gray-700">Data Produk</h3>
                <a href="{{ route('dashboard.productuser', ['id' => $pengguna['id']]) }}" 
                   class="btn btn-primary">Edit</a>
            </div>
            <div class="d-flex justify-content-between mb-4">
                <h3 class="text-xl font-semibold text-gray-700">Data Pelanggan</h3>
                <a href="{{ route('dashboard.customeruser', ['id' => $pengguna['id']]) }}"
                   class="btn btn-primary">Edit</a>
            </div>
            
            <!-- Riwayat Transaksi -->
            <div class="bg-white p-4 rounded shadow-sm">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Riwayat Transaksi</h3>  
                <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Status</th>
                        <th>Produk</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Transaksi berhasil</td>                                
                            <td>Kode Makanan : KM0001, Nama Makanan : Oreoreo</td>
                            <td>06/07/2024, 18:44:00</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Transaksi berhasil</td>
                            <td>Kode Makanan : KM0001, Nama Makanan : Oreoreo</td>
                            <td>06/07/2024, 18:44:00</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Transaksi berhasil</td>
                            <td>Kode Makanan : KM0001, Nama Makanan : Oreoreo</td>
                            <td>06/07/2024, 18:44:00</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Transaksi berhasil</td>
                            <td>Kode Makanan : KM0001, Nama Makanan : Oreoreo</td>
                            <td>06/07/2024, 18:44:00</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Transaksi berhasil</td>
                            <td>Kode Makanan : KM0001, Nama Makanan : Oreoreo</td>
                            <td>06/07/2024, 18:44:00</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Transaksi berhasil</td>
                            <td>Kode Makanan : KM0001, Nama Makanan : Oreoreo</td>
                            <td>06/07/2024, 18:44:00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
