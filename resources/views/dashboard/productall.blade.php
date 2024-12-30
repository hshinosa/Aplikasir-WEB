@extends('layouts.app')
@section('content')
<div class="flex-fill p-4">
    <h2 class="text-primary fw-semibold mb-6">Produk</h2>
        <div class="bg-white p-4 rounded shadow-sm">
            <div class="table-responsive">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($products) && $products->count() > 0)
                            @foreach ($products as $index => $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img alt="Product image" height="50" src="{{ $product['gambar_produk'] }}" width="50"/>
                                    </td>
                                    <td>{{ $product['nama_produk'] }}</td>
                                    <td>
                                        <a class="text-primary" href="#">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="text-danger ms-3" href="#">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center py-3">Data produk tidak tersedia.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="mt-4">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
       </div>
</div>
@endsection