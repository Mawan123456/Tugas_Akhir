<x-app>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> LAPORAN TAHUN {{ $tahun }}</h5>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('admin/laporan') }}" method="GET">
                        <div class="form-group">
                            <label for="selectedYear" class="control-label">Pilih Tahun:</label>
                            <select name="selectedYear" class="form-control default-select" id="selectedYear">
                                @for ($year = date('Y') + 2; $year >= date('Y') - 2; $year--)
                                <option value="{{ $year }}" @if ($year==$tahun) selected @endif>{{ $year }}</option>
                                @endfor
                            </select>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-right">Tampilkan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <!-- Chart.js -->
                    <canvas id="myChart" width="200" height="50"></canvas>
                    <hr>
                    <table class="table table-bordered">
                        <thead class="bg-dark">
                            <tr>
                                <th style="color: dark;" class="text-center">Bulan</th>
                                <th style="color: dark;" class="text-center">Total Pembelian</th>
                                <th style="color: dark;" class="text-center">Total Penjualan</th>
                                <th style="color: dark;" class="text-center">Keuntungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laporanPerBulan as $laporan)
                            <tr>
                                <td>{{ $laporan['bulan'] }}</td>
                                <td>{{ 'Rp.' . number_format($laporan['total_pembelian'], 0, ',', '.') }}</td>
                                <td>{{ 'Rp.' . number_format($laporan['total_penjualan'], 0, ',', '.') }}</td>
                                <td>{{ 'Rp.' . number_format($laporan['keuntungan'], 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');

            var bulan = @json(array_column($laporanPerBulan, 'bulan'));
            var totalPembelian = @json(array_column($laporanPerBulan, 'total_pembelian'));
            var totalPenjualan = @json(array_column($laporanPerBulan, 'total_penjualan'));

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: bulan,
                    datasets: [{
                            label: 'Total Pembelian',
                            data: totalPembelian,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Total Penjualan',
                            data: totalPenjualan,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app>