<x-app>
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> EDIT DATA PRODUK </h5>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ url('admin/produk') }}" class="btn btn-primary btn-tone btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('admin/produk', $produk->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="control-label">NAMA PRODUK</label>
                                        <select name="nama_produk" class="form-control" required>
                                            <option value="{{ $produk->nama_produk }}">{{ $produk->nama_produk }}</option>
                                            <option value="Bulat">Amplang Bulat</option>
                                            <option value="Stik Tipis">Amplang Stik Tipis</option>
                                            <option value="Stik Potong">Amplang Stik Potong</option>
                                        </select>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="control-label">BERAT PRODUK</label>
                                        <select name="berat_produk" class="form-control" required>
                                            <option value="{{ $produk->berat_produk }}">{{ $produk->berat_produk }} gr</option>
                                            <option value="60">60 gr</option>
                                            <option value="80">80 gr</option>
                                            <option value="500">500 gr</option>
                                        </select>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="control-label">VARIAN RASA</label>
                                        <select name="varian_rasa" class="form-control" required>
                                            <option value="{{ $produk->varian_rasa }}">{{ $produk->varian_rasa }}</option>
                                            <option value="Original">Original</option>
                                            <option value="Pedas Daun Jeruk">Pedas Daun Jeruk</option>
                                            <option value="Keju">Keju</option>
                                            <option value="Rumput Laut">Rumput Laut</option>
                                        </select>


                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>HARGA PRODUK</label>
                                        <select name="harga_produk" class="form-control" required>
                                            <option value="{{ $produk->harga_produk }}">{{ $produk->harga_produk }}</option>
                                            <option value="15000">Rp.15.000</option>
                                            <option value="18000">Rp.18.000</option>
                                            <option value="80000">Rp.80.000</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="control-label">STOK PRODUK</label>
                                        <input type="number" id="name" name="stok_produk" class="form-control" value="{{ $produk->stok_produk }}" placeholder="Masukan Stok Produk" required>
                                        @error('stok_produk')
                                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="" class="control-label">GAMBAR PRODUK</label>
                                        <input type="file" id="name" name="gambar_produk" class="form-control" placeholder="Masukan Gambar Produk" required>
                                        @error('gambar_produk')
                                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>DESKRIPSI</label>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="summernote" cols="30" rows="7" placeholder="Masukan Deskripsi Produk" required>{{ $produk->deskripsi }}</textarea>
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
</x-app>