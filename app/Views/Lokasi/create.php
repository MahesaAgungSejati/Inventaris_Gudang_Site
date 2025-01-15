<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lokasi</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Tambah Lokasi</h1>

        <!-- Menampilkan pesan error jika ada -->
        <?php if (session()->getFlashdata('errors')): ?>
            <ul class="alert alert-danger">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <!-- Form Tambah Lokasi -->
        <form action="/lokasi/store" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
                <label for="nama_lokasi" class="form-label">Nama Lokasi:</label>
                <input type="text" id="nama_lokasi" name="nama_lokasi" value="<?= old('nama_lokasi') ?>" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control"><?= old('deskripsi') ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Link ke Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
