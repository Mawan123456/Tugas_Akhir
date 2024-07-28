<x-app>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> DATA PELANGGAN </h5>
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
                            <a href="{{ url('admin/pelanggan/create') }}" class="float-right btn" style="background-color: rgb(72, 57, 241); color: white;">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="bg-dark">
                                    <th style="color: dark;" width="10px">No.</th>
                                    <th style="color: dark;" class="text-center">Nama Pelanggan</th>
                                    <th style="color: dark;" class="text-center">No Telepon</th>
                                    <th style="color: dark;" class="text-center">Alamat</th>
                                    <th style="color: dark;" width="100px" class="text-center">Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach($list_pelanggan->sortByDesc('created_at')->values() as $pelanggan)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $pelanggan->nama_pelanggan }}</td>
                                        <td class="text-center">{{ $pelanggan->no_hp }}</td>
                                        <td class="text-center">{{ $pelanggan->alamat }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <x-template.button.edit-button url="admin/pelanggan" id="{{ $pelanggan->id }}" />
                                                <x-template.button.delete-button url="admin/pelanggan" id="{{ $pelanggan->id }}" />
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