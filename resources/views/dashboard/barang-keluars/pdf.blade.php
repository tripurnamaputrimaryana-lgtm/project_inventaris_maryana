<!DOCTYPE html>
<html>
<head>
    <title>Barang Keluar PDF</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; }
        table, th, td { border: 1px solid black; padding: 6px; }
        th { background-color: #f2f2f2; }
        td { text-align: center; }
    </style>
</head>
<body>
    <h3>Data Barang Keluar</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Jenis Keluar</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangKeluars as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ ucfirst(str_replace('_',' ',$item->jenis_keluar)) }}</td>
                <td>{{ $item->tanggal_keluar }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
