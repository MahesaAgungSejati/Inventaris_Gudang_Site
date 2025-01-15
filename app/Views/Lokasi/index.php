<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lokasi</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?= view('layouts/navbar') ?>

    <div class="container mt-4">
        <h1>Daftar Lokasi</h1>
        <a href="/lokasi/create" class="btn btn-primary mb-3">Tambah Lokasi</a>

        <!-- Tabel Lokasi -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lokasi</th>
                    <th>Deskripsi</th>
                    <th>Created At</th>
                    <th>Updated At</th> <!-- Kolom baru untuk updated_at -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lokasi as $l): ?>
                    <tr>
                        <td><?= $l['id_lokasi'] ?></td>
                        <td><?= $l['nama_lokasi'] ?></td>
                        <td><?= $l['deskripsi'] ?></td>
                        <td><?= $l['created_at'] ?></td>
                        <td><?= $l['updated_at'] ?></td> <!-- Menampilkan updated_at -->
                        <td>
                            <a href="/lokasi/edit/<?= $l['id_lokasi'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/lokasi/delete/<?= $l['id_lokasi'] ?>" method="post" style="display:inline;">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Link ke Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
