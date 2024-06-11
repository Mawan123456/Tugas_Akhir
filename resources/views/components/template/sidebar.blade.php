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
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">FITUR</li>

                <!-- TopUp -->
                <li class="nav-item ">
                    <a href=" {{ url('admin/produk') }}" class="nav-link {{request()->is('admin/produk') ? 'active' : ''}}">
                        <i class=" nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Data Produk
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href=" {{ url('admin/penjualan') }}" class="nav-link {{request()->is('admin/penjualan') ? 'active' : ''}}">
                        <i class=" nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Data Penjualan
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href=" {{ url('admin/pembelian') }}" class="nav-link {{request()->is('admin/pembelian') ? 'active' : ''}}">
                        <i class=" nav-icon fab fa-opencart"></i>
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
                    <a href=" {{ url('admin/laporan') }}" class="nav-link {{request()->is('admin/laporan') ? 'active' : ''}}">
                        <i class=" nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>

                <!-- Payment -->
                <!-- <li class="nav-item ">
          <a href=" {{ url('admin/konsumen') }}" class="nav-link {{request()->is('admin/konsumen') ? 'active' : ''}}">
            <i class=" nav-icon fas fa-user-tag"></i>
            <p>
              Data Konsumen
            </p>
          </a>
        </li> -->

                <!-- Payment
        <li class="nav-item ">
          <a href=" {{ url('admin/keranjang') }}" class="nav-link {{request()->is('admin/keranjang') ? 'active' : ''}}">
            <i class=" nav-icon	fas fa-shopping-cart"></i>
            <p>
              Data Keranjang
            </p>
          </a>
        </li> -->
                <!-- <li class="nav-header">SETTING DATA</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Seting Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/banner') }}" class="nav-link {{request()->is('admin/banner') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Banner</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/logo') }}" class="nav-link {{request()->is('admin/logo') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Nama & Logo</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/footer') }}" class="nav-link {{request()->is('admin/footer') ? 'active' : ''}}">
                                <i class="nav-icon fa fas fa-text-height"></i>
                                <p>Deskripsi Footer</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/sosmed') }}" class="nav-link {{request()->is('admin/sosmed') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-link"></i>
                                <p>Link Sosial Media</p>
                            </a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>