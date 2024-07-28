<x-app>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align: center; font-size: 25px"> PROFIL ADMIN</h5>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('admin/profile', $user->id) }}/edit" class="btn btn-warning btn-tone btn-sm float-right mt-3 mb-3"><i class="fas fa-edit"></i> Edit Data</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dt class="font-weight-bold">NAMA LENGKAP</dt>
                            <dd>{{ $user->nama }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">USERNAME</dt>
                            <dd>{{ $user->username }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">NOMOR HP</dt>
                            <dd>{{ $user->no_hp }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">EMAIL</dt>
                            <dd>{{ $user->email }}</dd>
                        </div>
                        <div class="col-md-6">
                            <dt class="font-weight-bold">PASSWORD</dt>
                            <dd>{{ $user->password }}</dd>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>