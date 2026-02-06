<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h3>Data Peminjaman</h3>
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Status</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjamen as $p)
            <tr>
                <td>{{ $p->kode_peminjaman }}</td>
                <td>{{ $p->nama_peminjam }}</td>
                <td>{{ ucfirst($p->jenis_peminjam) }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ $p->user->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
