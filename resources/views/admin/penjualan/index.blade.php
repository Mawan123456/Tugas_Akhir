<x-app>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> DATA PENJUALAN </h5>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ url('admin/penjualan/create') }}" class="float-right btn" style="background-color: rgb(72, 57, 241); color: white;">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="bg-dark">
                                    <th style="color: dark;">No.</th>
                                    <th style="color: dark;" class="text-center">Tanggal</th>
                                    <th style="color: dark;" class="text-center">Nama Produk</th>
                                    <th style="color: dark;" class="text-center">Varian Rasa</th>
                                    <th style="color: dark;" class="text-center">Stok Terjual</th>
                                    <th style="color: dark;" class="text-center">Platform</th>
                                    <th style="color: dark;" class="text-center">Total Harga</th>
                                    <th style="color: dark;" width="100px" class="text-center">Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($list_penjualan as $penjualan)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $penjualan->tanggal }}</td>
                                        <td class="text-center">
                                            @if($penjualan->produk)
                                            {{ $penjualan->produk->nama_produk }}
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($penjualan->produk)
                                            {{ $penjualan->produk->varian_rasa }}
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $penjualan->stok_terjual}} pcs</td>
                                        <td class="text-center">{{ $penjualan->platform }}</td>
                                        <td class="text-center">Rp. {{ number_format($penjualan->total_harga) }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <x-template.button.info-button url="admin/penjualan" id="{{ $penjualan->id }}" />
                                                <x-template.button.edit-button url="admin/penjualan" id="{{ $penjualan->id }}" />
                                                <x-template.button.delete-button url="admin/penjualan" id="{{ $penjualan->id }}" />
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
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
</x-app>