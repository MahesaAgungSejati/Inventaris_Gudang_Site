<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?= view('layouts/navbar') ?>

    <div class="container mt-4">
        <h1 class="mb-4">Daftar Barang</h1>
        <a href="/barang/create" class="btn btn-primary mb-3">Tambah Barang</a>

        <!-- Tabel Barang -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barang as $b): ?>
                    <tr>
                        <td><?= $b['id_barang'] ?></td>
                        <td><?= $b['nama_barang'] ?></td>
                        <td>
                            <?php
                            // Cari kategori berdasarkan ID kategori barang
                            $kategori_item = array_filter($kategori, function($k) use ($b) {
                                return $k['id_kategori'] == $b['id_kategori'];
                            });
                            // Jika kategori ditemukan, tampilkan nama kategori
                            if (!empty($kategori_item)) {
                                echo reset($kategori_item)['nama_kategori'];
                            } else {
                                echo "Kategori tidak ditemukan";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            // Cari lokasi berdasarkan ID lokasi barang
                            $lokasi_item = array_filter($lokasi, function($l) use ($b) {
                                return $l['id_lokasi'] == $b['id_lokasi'];
                            });
                            // Jika lokasi ditemukan, tampilkan nama lokasi
                            if (!empty($lokasi_item)) {
                                echo reset($lokasi_item)['nama_lokasi'];
                            } else {
                                echo "Lokasi tidak ditemukan";
                            }
                            ?>
                        </td>
                        <td><?= $b['stok'] ?></td>
                        <td><?= $b['deskripsi'] ?></td>
                        <td><?= $b['created_at'] ?></td>
                        <td><?= $b['updated_at'] ?></td>
                        <td>
                            <a href="/barang/edit/<?= $b['id_barang'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/barang/delete/<?= $b['id_barang'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
