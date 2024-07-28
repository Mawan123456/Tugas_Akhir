<x-app title="Admin | WhatsApp Message New">
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> TAMBAH BROADCAST </h5>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <x-template.button.back-button url="admin/broadcast" />
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('admin/broadcast') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row satker-group">
                                    <div class="form-group col-md-12">
                                        <div class="form-group">
                                            <label for="judul_pesan" class="control-label">JUDUL PESAN AGENDA</label>
                                            <input type="text" name="judul_pesan" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="message">PESAN:</label>
                                        <textarea class="form-control" id="message" name="pesan" rows="4" required></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>