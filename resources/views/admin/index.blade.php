@extends('layouts.app')

@section('content')
    <div class="container mx-4">
        <h2>Daftar Ruangan</h2>
        <ul>
            <a class="btn btn-success" href="{{ route('admin.create') }}">Tambah Ruangan</a>
        </ul>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Ruangan</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $room->room_name }}</td>
                        <td>{{ $room->room_description }}</td>
                        <td>Rp {{ number_format($room->room_price, 0, ',', '.') }}</td>
                        <td><img src="{{ asset('pictures/' . $room->room_picture) }}" alt="room Image" width="50"></td>
                        <td>
                            <a href="{{ route('admin.edit', $room->id_room) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.destroy', $room->id_room) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
