<x-app title="Admin | Broadcast WhatsApp Message ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> KIRIM BROADCAST </h5>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <a href="{{ url('admin/broadcast/create') }}" class="float-right btn" style="background-color: rgb(72, 57, 241); color: white;">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </a>
                            </div>
                            <div class="table-responsive mt-3">
                                <table id="example1" class="table table-datatable table-bordered">
                                    <thead class="bg-dark">
                                        <th width="10px" class="text-center" style="color: white;">No</th>
                                        <th class="text-center" style="color: white;">Judul</th>
                                        <th class="text-center" style="color: white;">Tanggal Pengiriman</th>
                                        <th class="text-center" style="color: white;">Isi</th>
                                        <th width="10px" class="text-center" style="color: white;">Aksi</th>

                                    </thead>
                                    <tbody>
                                        @foreach ($list_broadcast as $broadcast)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $broadcast->judul_pesan }}</td>
                                            <td class="text-center">{{ $broadcast->tanggal_string }}</td>
                                            <td class="text-center">{{ $broadcast->pesan }}</td>
                                            <td class="text-center">
                                                <x-template.button.delete-button url="admin/broadcast" id="{{ $broadcast->id }}" />
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>