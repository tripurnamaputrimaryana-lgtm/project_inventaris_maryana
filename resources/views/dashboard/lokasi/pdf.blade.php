<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Lokasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
    </style>
</head>
<body>
    <h3>Data Lokasi</h3>
    <table>
        <thead>
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Lokasi</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lokasis as $index => $lokasi)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $lokasi->nama }}</td>
                <td>{{ $lokasi->deskripsi ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align: center;">Belum ada data lokasi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
