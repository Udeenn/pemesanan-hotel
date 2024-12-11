@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Ruangan Baru</h2>

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="room_name">Nama Ruangan</label>
                <input type="text" class="form-control" id="room_name" name="room_name" value="{{ old('room_name') }}" required>
            </div>
            <div class="form-group">
                <label for="room_description">Deskripsi Ruangan</label>
                <textarea class="form-control" id="room_description" name="room_description" rows="4" required>{{ old('room_description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="room_price">Harga Ruangan</label>
                <input type="number" class="form-control" id="room_price" name="room_price" value="{{ old('room_price') }}" required>
            </div>
            <div class="form-group">
                <label for="room_picture">Gambar Ruangan</label>
                <input type="file" class="form-control" id="room_picture" name="room_picture" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Ruangan</button>
        </form>
    </div>
@endsection
