<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lokasi</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Lokasi</h1>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="/lokasi/update/<?= $lokasi['id_lokasi'] ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="nama_lokasi" class="form-label">Nama Lokasi:</label>
                <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" value="<?= old('nama_lokasi', $lokasi['nama_lokasi']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"><?= old('deskripsi', $lokasi['deskripsi']) ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <!-- Link ke Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
