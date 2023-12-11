@extends ('layout.app')

@section('body')
    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <div class="card p-4" style="width:fit-content; margin: 0 auto;">
            <h1 class="mb-1 text-center border-bottom 
            "> Tambah Data Karyawan </h1>
            <div class="row mt-2 justify-content-center">

                <div class="col-3">
                    <input type="text" name="nama" class="form-control" placeholder="input nama">
                </div>

                <div class="col-3">
                    <input type="text" name="posisi" class="form-control" placeholder="input jabatan">
                </div>

                <div class="col-3">
                    <input type="text" name="gaji" class="form-control" placeholder="input gaji">
                </div>


            </div>
            <div class="d-flex justify-content-end gap-2 mt-4">
                <button class="btn btn-warning text-light">
                    <a href="{{ route('karyawan.index') }}">Cancel</a>
                </button>

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </div>
    </form>
@endsection
