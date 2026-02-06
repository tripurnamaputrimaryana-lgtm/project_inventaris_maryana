@extends('layouts.dashboard')

@section('title', 'Dashboard Inventaris')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

  <!-- HEADER -->
  <div class="row mb-4">
    <div class="col">
      <h4 class="fw-bold mb-1">Dashboard Inventaris</h4>
      <p class="text-muted mb-0">Ringkasan data inventaris</p>
    </div>
  </div>

  <!-- KARTU STATISTIK -->
  <div class="row g-4 mb-4">

    <div class="col-xl-3 col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-body d-flex align-items-center">
          <div class="avatar bg-primary me-3">
            <i class="bx bx-box text-white fs-4"></i>
          </div>
          <div>
            <small class="text-muted">Total Barang</small>
            <h4 class="fw-bold mb-0">{{ $totalBarang ?? 0 }}</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-body d-flex align-items-center">
          <div class="avatar bg-success me-3">
            <i class="bx bx-category text-white fs-4"></i>
          </div>
          <div>
            <small class="text-muted">Kategori</small>
            <h4 class="fw-bold mb-0">{{ $totalKategori ?? 0 }}</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-body d-flex align-items-center">
          <div class="avatar bg-warning me-3">
            <i class="bx bx-map text-white fs-4"></i>
          </div>
          <div>
            <small class="text-muted">Lokasi</small>
            <h4 class="fw-bold mb-0">{{ $totalLokasi ?? 0 }}</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-body d-flex align-items-center">
          <div class="avatar bg-danger me-3">
            <i class="bx bx-transfer text-white fs-4"></i>
          </div>
          <div>
            <small class="text-muted">Peminjaman</small>
            <h4 class="fw-bold mb-0">{{ $totalPeminjaman ?? 0 }}</h4>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- GRAFIK PEMINJAMAN -->
  <div class="row mb-4">
    <div class="col">
      <div class="card shadow-sm">
        <div class="card-header">
          <h6 class="mb-0">Grafik Peminjaman Mingguan</h6>
        </div>
        <div class="card-body">
          <div id="chartPeminjaman"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- TABEL PEMINJAMAN TERBARU -->
  <div class="row">
    <div class="col">
      <div class="card shadow-sm">
        <div class="card-header">
          <h6 class="mb-0">Peminjaman Terbaru</h6>
        </div>
        <div class="card-body">
          <table class="table table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th>Barang</th>
                <th>Peminjam</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @forelse($peminjaman as $row)
              <tr>
                <td>{{ $row->barang->nama_barang ?? '-' }}</td>
                <td>{{ $row->user->name ?? '-' }}</td>
                <td>{{ $row->jumlah }}</td>
                <td>
                  <span class="badge bg-{{ $row->status == 'dipinjam' ? 'warning' : 'success' }}">
                    {{ ucfirst($row->status) }}
                  </span>
                </td>
                <td>{{ $row->created_at->format('d-m-Y') }}</td>
              </tr>
              @empty
              <tr>
                <td colspan="5" class="text-center text-muted">
                  Belum ada data peminjaman
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@push('scripts')
<script>
  const dataPeminjaman = @json($chartPeminjaman ?? []);

  new ApexCharts(document.querySelector('#chartPeminjaman'), {
    chart: {
      type: 'area',
      height: 300,
      toolbar: { show: false }
    },
    series: [{
      name: 'Peminjaman',
      data: dataPeminjaman
    }],
    stroke: { curve: 'smooth' },
    dataLabels: { enabled: false },
    colors: ['#696cff'],
    xaxis: {
      categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']
    }
  }).render();
</script>
@endpush
