@extends('layouts.app')

@section('content')
<div class="flex-fill p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-semibold">Pengguna</h2>
    </div>
    <div class="bg-white p-4 rounded shadow-sm">
        <div class="table-responsive">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>No. Telp</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paginatedPengguna as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user['nama'] }}</td>
                        <td>{{ $user['username'] }}</td>
                        <td>{{ $user['nomor_telepon'] ?? 'N/A' }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>
                            <a class="text-primary" href="{{ route('dashboard.userdetail', $user['id']) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('dashboard.penggunadestroy', $user['id']) }}" method="POST" style="display:inline; margin-left: 0.5rem;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0 m-0">
                                    <i class="fas fa-trash"></i>
                                </button>
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
                    {{ $paginatedPengguna->links('pagination::bootstrap-4') }}
                </ul>
            </nav>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function (e) {
                if (!confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection