@extends('layouts.app')

@section('content')
<div class="flex-fill p-4">
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('dashboard.userdetail', ['id' => $pengguna['id']]) }}" class="text-gray-600 me-3">
            <i class="fas fa-arrow-left text-xl" style= "font-size: 25px;"></i>
        </a>
        <h2 class="text-primary fw-bold">Pelanggan</h2>
    </div>
    <div class="bg-white p-4 rounded shadow-sm">
        <div class="table-responsive">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th class="pb-3">NO</th>
                        <th class="pb-3">Nama</th>
                        <th class="pb-3">No. Telp</th>
                        <th class="pb-3">Email</th>
                        <th class="pb-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelangganData as $pelanggan)
                    <tr class="border-t">
                        <td class="py-3">{{ $loop->iteration }}</td>
                        <td class="py-3">{{ $pelanggan['nama']}}</td> <!-- Akses sebagai array jika data array -->
                        <td class="py-3">{{ $pelanggan['nomor_telepon'] ?? 'N/A' }}</td> <!-- Akses sebagai array -->
                        <td class="py-3">{{ $pelanggan['email'] ?? 'N/A' }}</td> <!-- Akses sebagai array -->
                        <td class="py-3">
                            <a href="javascript:void(0);" class="text-blue-600" onclick="openSidebar({{ json_encode($pelanggan) }})">
                            <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('dashboard.customerdestroy', ['id' => $pengguna['id'], 'customerId' => $pelanggan['id']]) }}" method="POST" style="display:inline; margin-left: 0.5rem;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger border-none bg-transparent p-0"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            <!-- Pagination Links -->
            <nav aria-label="Pagination">
                <ul class="pagination justify-content-end">
                    {{ $pelangganData->links('pagination::bootstrap-4') }}
                </ul>
            </nav>
            </div>
        </div>
    </div>
    <!-- Overlay Background -->
    <div id="overlay" class="position-fixed top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0; visibility: hidden; transition: opacity 0.3s; z-index: 1040;"></div>

    <!-- Sidebar Edit -->
    <div id="editSidebarPelanggan" class="position-fixed top-0 end-0 bg-white shadow-lg vh-100 p-4" style="width: 400px; transform: translateX(100%); transition: transform 0.3s; z-index: 1050;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-700">Edit Pelanggan</h3>
            <!-- Tombol Close -->
            <button class="btn btn-light btn-sm" onclick="closeSidebar()">Close</button>
        </div>
        <form id="editForm" action="#" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="editIdPengguna" name="id_pengguna">
            <div class="mb-3">
                <label class="form-label text-gray-600">Nama</label>
                <input id="editNama" class="form-control" type="text" name="nama" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-gray-600">No. Telp</label>
                <input id="editNomorTelepon" class="form-control" type="tel" name="nomor_telepon">
            </div>
            <div class="mb-3">
                <label class="form-label text-gray-600">Email</label>
                <input id="editEmail" class="form-control" type="email" name="email">
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openSidebar(pelanggan) {
        const sidebar = document.getElementById('editSidebarPelanggan');
        const overlay = document.getElementById('overlay');

        // Atur URL action pada form sesuai data pelanggan
        document.getElementById('editForm').action = `/dashboard/pengguna/${pelanggan.id_pengguna}/customeruser/${pelanggan.id}`;
        
        // Isi nilai pada input form sesuai data pelanggan
        document.getElementById('editIdPengguna').value = pelanggan.id_pengguna; // ID Pengguna
        document.getElementById('editNama').value = pelanggan.nama; // Nama
        document.getElementById('editNomorTelepon').value = pelanggan.nomor_telepon || ''; // Nomor Telepon
        document.getElementById('editEmail').value = pelanggan.email || ''; // Email

        // Tampilkan sidebar dan overlay
        sidebar.style.transform = 'translateX(0)';
        overlay.style.opacity = '0.5';
        overlay.style.visibility = 'visible';
    }


    function closeSidebar() {
        const sidebar = document.getElementById('editSidebarPelanggan');
        const overlay = document.getElementById('overlay');
        sidebar.style.transform = 'translateX(100%)'; // Menyembunyikan sidebar
        overlay.style.opacity = '0'; // Menyembunyikan overlay
        overlay.style.visibility = 'hidden'; // Membuat overlay tidak terlihat
    }

    // Menutup sidebar jika klik di luar sidebar
    document.getElementById('overlay').addEventListener('click', closeSidebar);
</script>

@endsection