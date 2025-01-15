<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/barang') ?>">Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/kategori') ?>">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/lokasi') ?>">Lokasi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Link ke Bootstrap JS (jika belum ada di footer) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
