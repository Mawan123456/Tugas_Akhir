<x-app>
    <div class="card-header">
        <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px">DETAIL PEMBELIAN</h5>
    </div>
    <a href="{{ url('admin/pembelian') }}" class="btn btn-primary btn-tone btn-sm mt-4">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <dt class="font-weight-bold">TANGGAL PEMBELIAN</dt>
                    <dd>{{ $pembelian->tanggal }}</dd>
                </div>
                <div class="col-md-6 mb-3">
                    <dt class="font-weight-bold">JUDUL</dt>
                    <dd>{{ $pembelian->judul }}</dd>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <dt class="font-weight-bold">DESKRIPSI</dt>
                    <textarea class="form-control" rows="3" disabled>{{ strip_tags($pembelian->deskripsi) }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h5 class="font-weight-bold text-dark" style="text-align:center; font-size: 25px">TAMBAH DATA BAHAN</h5>
            </div>
            <br>
            <div class="card">
                <div class="accordion" id="accordionExample">
                    <div class="card-header" id="headingSection">
                        <h1 class="card-title float-right">
                            <button class="btn" style="background-color: rgb(72, 57, 241); color: white; font-weight: bold;" type="button" data-toggle="collapse" data-target="#collapseSection" aria-expanded="false" aria-controls="collapseSection">
                                <i class="fas fa-plus"></i>&nbsp;&nbsp; Tambah Data
                            </button>

                        </h1>
                    </div>
                    <div id="collapseSection" class="collapse" aria-labelledby="headingSection" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ url('admin/pembelian-detail') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="id_pembelian" value="{{ $pembelian->id }}">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="control-label">NAMA BAHAN
                                                    </label>
                                                    <input type="text" id="nama_bahan" name="nama_bahan" class="form-control" placeholder="Masukan Nama Bahan" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="control-label">JUMLAH</label>
                                                    <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Masukan Jumlah Bahan " required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="control-label">HARGA SATUAN</label>
                                                    <input type="number" id="harga_satuan" name="harga_satuan" class="form-control" placeholder="Masukan Harga Satuan" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="control-label">TOTAL HARGA</label>
                                                    <input type="number" id="total_harga" name="total_harga" class="form-control" placeholder="" required readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <button class="btn btn-primary float-right"><i class="far fa-save"></i> Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <th style="color: dark;" width="10px">NO</th>
                            <th style="color: dark;">NAMA BAHAN</th>
                            <th style="color: dark;">JUMLAH</th>
                            <th style="color: dark;">HARGA SATUAN</th>
                            <th style="color: dark;">TOTAL HARGA</th>
                            <th style="color: dark;" width=" 90px">AKSI</th>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($pembelian_detail as $detail)
                            @if($pembelian->id == $detail->id_pembelian)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-center">{{ $detail->nama_bahan }}</td>
                                <td class="text-center">{{ $detail->jumlah }}</td>
                                <td class="text-center">Rp. {{number_format($detail->harga_satuan)}}</td>
                                <td class="text-center">Rp. {{number_format($detail->total_harga)}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="#edit{{ $detail->id }}" data-toggle="modal" class="btn btn-warning float-right"><span class="fa fa-edit"></span></a>
                                        <x-template.button.delete-button url="admin/pembelian-detail" id="{{ $detail->id }}" />
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT -->
    @foreach($pembelian_detail as $detail)
    <div class="modal fade" id="edit{{ $detail->id }}" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">EDIT DATA BAHAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/pembelian-detail', $detail->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id_pembelian" value="{{ $pembelian->id }}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">NAMA BAHAN
                                    </label>
                                    <input type="text" id="nama_bahan" name="nama_bahan" class="form-control" placeholder="Masukan Nama Bahan" required value="{{ $detail->nama_bahan }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">JUMLAH
                                    </label>
                                    <input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="Masukan Jumlah Bahan" required value="{{ $detail->jumlah }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">HARGA SATUAN</label>
                                    <input type="number" id="harga_satuan" name="harga_satuan" class="form-control" placeholder="Masukan Harga Satuan" required value="{{ $detail->harga_satuan }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">TOTAL HARGA</label>
                                    <input type="number" id="total_harga" name="total_harga" class="form-control" placeholder="Masukan Total Harga" required value="{{ $detail->total_harga }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    <!-- END MODAL EDIT -->
</x-app>