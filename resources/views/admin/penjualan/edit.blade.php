<x-app>
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> EDIT DATA PENJUALAN </h5>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ url('admin/penjualan') }}" class="btn btn-primary btn-tone btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('admin/penjualan', $penjualan->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="control-label">NAMA PRODUK</label>
                                        <select name="id_produk" id="id_produk" class="form-control" required>
                                            <option value="{{ $penjualan->id_produk }}">{{ $penjualan->produk->nama_produk }}</option>
                                            @foreach($produk as $produk)
                                            <option value="{{ $produk->id }}" data-harga="{{ $produk->harga_produk }}">{{ $produk->nama_produk }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="control-label">PLATFROM</label>
                                        <select name="platform" class="form-control" required>
                                            <option value="{{ $penjualan->platform }}">{{ $penjualan->platform }}</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="Tiktok">Tiktok</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="X">X</option>
                                            <option value="WhatsApp">WhatsApp</option>
                                            <option value="Shopee">Shopee</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="stok_terjual" class="control-label">STOK TERJUAL</label>
                                        <input type="number" id="stok_terjual" name="stok_terjual" class="form-control" placeholder="Masukan Stok Terjual" value="{{ $penjualan->stok_penjualan }}" required>
                                        @error('stok_terjual')
                                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="total_harga" class="control-label">TOTAL HARGA</label>
                                        <input type="number" id="total_harga" name="total_harga" class="form-control" placeholder="Masukan Total Harga" readonly>
                                        @error('total_harga')
                                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="summernote" cols="30" rows="7" placeholder="Masukan Deskripsi Penjualan" required>{{ $penjualan->deskripsi }}</textarea>
                                        @error('deskripsi')
                                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p>
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