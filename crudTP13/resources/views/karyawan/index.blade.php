@extends('layout.app')
@section('body')
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="mb-1">Data Karyawan</h1>
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success mt-3">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container mt-5">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Posisi</th>
                    <th scope="col">Gaji</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan as $karyawan)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $karyawan->nama }}</td>
                        <td>{{ $karyawan->posisi }}</td>
                        <td>{{ $karyawan->gaji }}</td>
                        <td>
                            <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <form id="deleteForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function deleteKaryawan(id) {
                var url = "{{ route('karyawan.destroy', ':id') }}";
                url = url.replace(':id', id);
                document.getElementById('deleteForm').action = url;
                $('#deleteModal').modal('show');
            }
        </script>
    @endsection
