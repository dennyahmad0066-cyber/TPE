<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row mt-4">
        <div class="col-md-6">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th style="width: 40%">Kategori Produk</th>
                        <td>{{ $data['kategori_produk'] }}</td> 
                    </tr>
                    <tr>
                        <th>Nama Produk</th>
                        <td>{{ $data['nama_produk'] }}</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>{{ $data['stok'] }}</td>
                    </tr>
                    <tr>
                        <th>Harga Produk</th>
                        <td>Rp{{ number_format($data['harga_produk'], 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ url('produk/create') }}" class="btn btn-primary mt-3">Kembali ke Form</a>
        </div>
    </div>
</div>

</body>
</html>