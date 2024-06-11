<x-app>
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> TAMBAH DATA PELANGGAN </h5>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ url('admin/pelanggan') }}" class="btn btn-primary btn-tone btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('admin/pelanggan') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="control-label">Nama Pelanggan</label>
                                        <div class=" mb-4">
                                            <input type="text" id="name" name="nama_pelanggan" class="form-control" placeholder="Masukan Nama Pelanggan" required>
                                            @error('nama_pelanggan')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="control-label">No Telepon</label>
                                        <div class=" mb-4">
                                            <input type="text" id="name" name="nama_pelanggan" class="form-control" placeholder="Masukan Nomor Telepon" required>
                                            @error('nama_pelanggan')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="control-label">Alamat</label>
                                        <div class=" mb-4">
                                            <input type="text" id="name" name="nama_pelanggan" class="form-control" placeholder="Masukan Alamat" required>
                                            @error('nama_pelanggan')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control @error('deskripsi_produk') is-invalid @enderror" name="deskripsi_produk" id="summernote" cols="30" rows="7" placeholder="Masukan Deskripsi Produk" required></textarea>
                                        @error('deskripsi_produk')
                                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                        @enderror
                                    </div>
                                    <br>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-tone float-right"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @push('js')
    <script src="{{ asset('resources/js/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('resources/js/rupiah.js') }}"></script>
    @endpush
</x-app>