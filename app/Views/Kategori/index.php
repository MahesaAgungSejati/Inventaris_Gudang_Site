<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?= view('layouts/navbar') ?>

    <div class="container mt-4">
        <h1>Daftar Kategori</h1>

        <a href="/kategori/create" class="btn btn-primary mb-3">Tambah Kategori</a>

        <!-- Tabel Kategori -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Created At</th>
                    <th>Updated At</th> <!-- Kolom baru untuk updated_at -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kategori as $k): ?>
                    <tr>
                        <td><?= $k['id_kategori'] ?></td>
                        <td><?= $k['nama_kategori'] ?></td>
                        <td><?= $k['deskripsi'] ?></td>
                        <td><?= $k['created_at'] ?></td>
                        <td><?= $k['updated_at'] ?></td> <!-- Menampilkan updated_at -->
                        <td>
                            <a href="/kategori/edit/<?= $k['id_kategori'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/kategori/delete/<?= $k['id_kategori'] ?>" method="post" style="display:inline;">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Delete</button>
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
