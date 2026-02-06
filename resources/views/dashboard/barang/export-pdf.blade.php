<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Barang</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background: #eee; }
    </style>
</head>
<body>

<h3 style="text-align:center;">DATA BARANG INVENTARIS</h3>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Kondisi</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangs as $i => $barang)
        <tr>
            <td align="center">{{ $i+1 }}</td>
            <td>{{ $barang->kode_barang }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->kategori->nama ?? '-' }}</td>
            <td>{{ $barang->lokasi->nama ?? '-' }}</td>
            <td align="center">{{ ucfirst(str_replace('_',' ', $barang->kondisi)) }}</td>
            <td align="center">{{ $barang->jumlah }} {{ $barang->satuan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
