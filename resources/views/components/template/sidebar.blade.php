<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-slate-900">
    <!-- Brand Logo -->
    <a href="{{ url('dashboard') }}" class="brand-link">
        <img src="{{ url('/') }}/template-admin/dist/img/logo-ico.png" alt="Logo" class="brand-image img-circle" style="opacity: .8">
        <span class="brand-text font-weight-bold">Amplang Kite</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href=" {{ url('admin/dashboard') }}" class="nav-link {{request()->is('admin/dashboard') ? 'active' : ''}}">
                        <i class=" nav-icon fas fa-home"></i>
                        <p>
                            Dasboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">FITUR</li>

                <!-- TopUp -->
                <li class="nav-item ">
                    <a href=" {{ url('admin/produk') }}" class="nav-link {{request()->is('admin/produk') ? 'active' : ''}}">
                        <i class=" nav-icon fas fa-database"></i>
                        <p>
                            Data Produk
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href=" {{ url('admin/penjualan') }}" class="nav-link {{request()->is('admin/penjualan') ? 'active' : ''}}">
                        <i class=" nav-icon fas fa fa-shopping-cart"></i>
                        <p>
                            Data Penjualan
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href=" {{ url('admin/pembelian') }}" class="nav-link {{request()->is('admin/pembelian') ? 'active' : ''}}">
                        <i class=" nav-icon fab fa fa-cart-arrow-down"></i>
                        <p>
                            Data Pembelian
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href=" {{ url('admin/pelanggan') }}" class="nav-link {{request()->is('admin/pelanggan') ? 'active' : ''}}">
                        <i class=" nav-icon fas fa-users"></i>
                        <p>
                            Data Pelanggan
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href=" {{ url('admin/broadcast') }}" class="nav-link {{request()->is('admin/broadcast') ? 'active' : ''}}">
                        <i class=" nav-icon fas fa-broadcast-tower"></i>
                        <p>
                            Broadcast
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href=" {{ url('admin/laporan') }}" class="nav-link {{request()->is('admin/laporan') ? 'active' : ''}}">
                        <i class=" nav-icon fas fa-file-alt"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>