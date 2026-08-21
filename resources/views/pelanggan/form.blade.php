<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($pelanggan) ? 'Edit' : 'Tambah' }} Pelanggan</title>
</head>
<body>
    <h2>{{ isset($pelanggan) ? 'Edit Data' : 'Tambah Data' }} Pelanggan</h2>

    <form action="{{ isset($pelanggan) ? url('/pelanggan/create/'.$pelanggan->id) : url('/pelanggan/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div>
            <label>Nama Lengkap:</label><br>
            <input type="text" name="nama_lengkap" value="{{ isset($pelanggan) ? $pelanggan->nama_lengkap : '' }}" required>
        </div>
        <br>

        <div>
            <label>Jenis Kelamin:</label><br>
            <select name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ (isset($pelanggan) && $pelanggan->jenis_kelamin == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ (isset($pelanggan) && $pelanggan->jenis_kelamin == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <br>

        <div>
            <label>Nomor HP:</label><br>
            <input type="text" name="nomor_hp" value="{{ isset($pelanggan) ? $pelanggan->nomor_hp : '' }}" required>
        </div>
        <br>

        <div>
            <label>Alamat Email:</label><br>
            <input type="email" name="alamat_email" value="{{ isset($pelanggan) ? $pelanggan->alamat_email : '' }}" required>
        </div>
        <br>

        <div>
            <label>Upload Foto:</label><br>
            <input type="file" name="foto" accept="image/*">
        </div>
        <br>

        <button type="submit">Simpan Data</button>
        <a href="{{ url('/pelanggan') }}">
            <button type="button">Batal</button>
        </a>
    </form>
</body>
</html>