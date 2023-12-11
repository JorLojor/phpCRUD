@extends('layout.app')

@section('body')
    <div class="container">
        <h1>Edit Data Karyawan</h1>

        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Your form fields go here -->
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="{{ $karyawan->nama }}" required>

            <label for="posisi">Posisi:</label>
            <input type="text" name="posisi" value="{{ $karyawan->posisi }}" required>

            <label for="gaji">Gaji:</label>
            <input type="text" name="gaji" value="{{ $karyawan->gaji }}" required>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection


