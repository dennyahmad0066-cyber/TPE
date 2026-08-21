<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Produk - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<main style="margin-top: 70px">
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <b> Perhatian </b>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <form action="{{ url('/produk') }}" method="POST">
    @csrf
                    
                    <div class="mb-3 row">
                        <label for="kategori_produk" class="col-sm-2 col-form-label">Kategori Produk</label>
                        <div class="col-sm-5">
                            <select name="kategori_produk" id="kategori_produk" class="form-control">
                                <option value="">- Pilih Kategori Produk -</option>
                                <option value="Sepatu" {{ old('kategori_produk') == 'Sepatu' ? 'selected' : '' }}>Sepatu</option>
                                <option value="Baju" {{ old('kategori_produk') == 'Baju' ? 'selected' : '' }}>Baju</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="{{ old('nama_produk') }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok" value="{{ old('stok') }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga_produk" class="col-sm-2 col-form-label">Harga Produk</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="harga_produk" id="harga_produk" placeholder="Harga Produk" value="{{ old('harga_produk') }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-5 offset-sm-2">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>