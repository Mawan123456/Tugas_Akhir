<x-app>
    <div class="card-header">
        <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> DETAIL PRODUK
        </h5>
    </div>
    <a href="{{ url('admin/produk') }}" class="btn btn-primary btn-tone btn-sm mt-4"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card">
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="card" style="width: 25rem;">
                    <div class="card-body">
                        <img src="{{ url($produk->gambar_produk) }}" class="img-fluid">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <dt class="font-weight-bold">NAMA PRODUK</dt>
                    <dd>{{ $produk->nama_produk }}</dd>
                </div>
                <div class="col-md-6">
                    <dt class="font-weight-bold">HARGA</dt>
                    <dd>Rp. {{ number_format($produk->harga_produk) }}</dd>
                </div>
                <div class="col-md-6">
                    <dt class="font-weight-bold">BERAT</dt>
                    <dd>{{ $produk->berat_produk }} gr</dd>
                </div>
                <div class="col-md-6">
                    <dt class="font-weight-bold">STOK</dt>
                    <dd>{{ $produk->stok_produk }} Pcs</dd>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <dt class="font-weight-bold">DESKRIPSI</dt>
                    <textarea class="form-control" rows="10" disabled>{{ strip_tags($produk->deskripsi) }}</textarea>
                </div>
            </div>
        </div>
    </div>
</x-app>