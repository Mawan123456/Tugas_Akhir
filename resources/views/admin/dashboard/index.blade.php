<x-app>
    <div class="card-header">
        <h5 class="m-0 font-weight-bold text-dark" style="font-size: 30px"> SELAMAT DATANG ADMIN
        </h5>
    </div>
    <div class="mt-6">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-database"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Data Produk</span>
                                <span class="info-box-number">
                                    {{$produk}}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-4 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa fa-shopping-cart"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Data Penjualan</span>
                                <span class="info-box-number">
                                    {{$penjualan}}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-4 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Data Pelanggan</span>
                                <span class="info-box-number">
                                    {{$pelanggan}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- Video Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Informasi Video</h5>
                                <video width="100%" height="auto" controls>
                                    <source src="{{ asset('1.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <div class="clearfix hidden-md-up"></div>
</x-app>