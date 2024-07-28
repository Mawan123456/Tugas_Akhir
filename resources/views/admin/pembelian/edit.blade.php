<x-app>
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> EDIT DATA PEMBELIAN </h5>
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
                            <form action="{{ url('admin/pembelian', $pembelian->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="judul" class="control-label">JUDUL</label>
                                        <div class="mb-4">
                                            <input type="text" id="judul" name="judul" class="form-control" placeholder="Masukan Judul" required value="{{ $pembelian->judul }}">
                                            @error('judul')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_pembelian" class="control-label">TANGGAL PEMBELIAN</label>
                                        <div class="mb-4">
                                            <input type="date" id="tanggal_pembelian" name="tanggal_pembelian" class="form-control" required value="{{ $pembelian->tanggal_pembelian }}">
                                            @error('tanggal_pembelian')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>DESKRIPSI</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="summernote" cols="30" rows="7" placeholder="Masukan Deskripsi Pembelian" required value="{{ $pembelian->deskripsi }}">{{ $pembelian->deskripsi }}</textarea>
                                    @error('deskripsi')
                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                    @enderror
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
    <script>
        $(document).ready(function() {
            function calculateTotalHarga() {
                var hargaSatuan = parseFloat($('#harga_satuan').val()) || 0;
                var jumlah = parseFloat($('#jumlah').val()) || 0;
                var totalHarga = hargaSatuan * jumlah;
                $('#total_harga').val(totalHarga);
            }

            $('#harga_satuan, #jumlah').change(function() {
                calculateTotalHarga();
            });

            // Initialize the total_harga on page load
            calculateTotalHarga();
        });
    </script>
    @endpush
</x-app>