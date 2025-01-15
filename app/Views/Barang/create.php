<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Tambah Barang</h1>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="/barang/store" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang:</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= old('nama_barang') ?>" required>
            </div>

            <div class="mb-3">
                <label for="id_kategori" class="form-label">Kategori:</label>
                <select id="id_kategori" name="id_kategori" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k['id_kategori'] ?>" <?= old('id_kategori') == $k['id_kategori'] ? 'selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_lokasi" class="form-label">Lokasi:</label>
                <select id="id_lokasi" name="id_lokasi" class="form-select" required>
                    <option value="">-- Pilih Lokasi --</option>
                    <?php foreach ($lokasi as $l): ?>
                        <option value="<?= $l['id_lokasi'] ?>" <?= old('id_lokasi') == $l['id_lokasi'] ? 'selected' : '' ?>><?= $l['nama_lokasi'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok:</label>
                <input type="number" class="form-control" id="stok" name="stok" value="<?= old('stok') ?>" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" required><?= old('deskripsi') ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Link ke Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
