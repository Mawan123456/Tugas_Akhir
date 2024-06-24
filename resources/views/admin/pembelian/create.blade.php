<x-app>
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> TAMBAH DATA PEMBELIAN</h5>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ url('admin/pembelian') }}" class="btn btn-primary btn-tone btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('admin/pembelian') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="control-label">NAMA BAHAN
                                        </label>
                                        <input type="text" id="name" name="nama_bahan" class="form-control" placeholder="Masukan Nama Bahan" required>
                                        @error('nama_bahan')
                                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="control-label">JUMLAH</label>
                                        <input type="text" id="name" name="jumlah" class="form-control" placeholder="Masukan Jumlah Bahan" required>
                                        @error('jumlah')
                                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                        @enderror

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="control-label">HARGA SATUAN</label>
                                        <input type="text" id="name" name="harga_satuan" class="form-control" placeholder="Masukan Harga Satuan" required>
                                        @error('harga_satuan')
                                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                        @enderror


                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="control-label">TOTAL HARGA</label>
                                        <input type="text" id="name" name="total_harga" class="form-control" placeholder="Masukan Total Harga" required>
                                        @error('total_harga')
                                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                        @enderror

                                    </div>

                                    <div class="col-md-12">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="summernote" cols="30" rows="7" placeholder="Masukan Deskripsi" required></textarea>
                                        @error('deskripsi')
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