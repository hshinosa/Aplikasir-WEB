@extends('layouts.app')

@section('content')
<div class="d-flex min-vh-100">
    <!-- Main Content -->
    <div class="flex-fill p-4">
        <h2 class="text-primary fw-bold">Selamat Datang, Sinta Haidar Alama!</h2>
        <p class="text-secondary">Senin 21 Oktober 2024</p>

        <!-- Dashboard Cards -->
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="d-flex align-items-center bg-white shadow p-3 rounded">
                    <i class="fas fa-user text-primary me-3 fs-3"></i>
                    <div>
                        <span class="text-secondary">Pengguna Harian</span>
                        <div class="fw-bold fs-4">{{ $totalUsers }}</div>
                    </div>
                </div>
            </div>
            <!-- Repeatable Cards -->
            <div class="col-md-3">
                <div class="d-flex align-items-center bg-white shadow p-3 rounded">
                    <i class="fas fa-user text-primary me-3 fs-3"></i>
                    <div>
                        <span class="text-secondary">Pengguna Harian</span>
                        <div class="fw-bold fs-4">{{ $totalUsers }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center bg-white shadow p-3 rounded">
                    <i class="fas fa-user text-primary me-3 fs-3"></i>
                    <div>
                        <span class="text-secondary">Pengguna Harian</span>
                        <div class="fw-bold fs-4">{{ $totalUsers }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center bg-white shadow p-3 rounded">
                    <i class="fas fa-user text-primary me-3 fs-3"></i>
                    <div>
                        <span class="text-secondary">Pengguna Harian</span>
                        <div class="fw-bold fs-4">{{ $totalUsers }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity History -->
        <div class="bg-white shadow p-4 rounded mt-4">
            <h3 class="text-secondary">Riwayat Kegiatan</h3>
            <table class="table mt-3">
                <thead>
                    <tr class="text-secondary">
                        <th scope="col">NO</th>
                        <th scope="col">Pengguna</th>
                        <th scope="col">Aktivitas</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Repeatable Row for Activity -->
                    <tr>
                        <td>1</td>
                        <td>Admin</td>
                        <td>Menambahkan data pengguna baru</td>
                        <td>Kode Makanan: KM0001, Nama Makanan: Oreoreo, Informasi Gizi...</td>
                        <td>06/07/2024, 18:44:00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Admin</td>
                        <td>Menambahkan data pengguna baru</td>
                        <td>Kode Makanan: KM0001, Nama Makanan: Oreoreo, Informasi Gizi...</td>
                        <td>06/07/2024, 18:44:00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Admin</td>
                        <td>Menambahkan data pengguna baru</td>
                        <td>Kode Makanan: KM0001, Nama Makanan: Oreoreo, Informasi Gizi...</td>
                        <td>06/07/2024, 18:44:00</td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-end">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection