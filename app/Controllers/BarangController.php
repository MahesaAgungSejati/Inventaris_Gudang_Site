<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\LokasiModel;

class BarangController extends BaseController
{
    protected $barangModel;
    protected $kategoriModel;
    protected $lokasiModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->kategoriModel = new KategoriModel();
        $this->lokasiModel = new LokasiModel();
    }

    // Menampilkan semua barang
    public function index()
    {
        $data['barang'] = $this->barangModel->getAllBarang();
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['lokasi'] = $this->lokasiModel->findAll();
        return view('barang/index', $data);
    }

    // Menampilkan form tambah barang
    public function create()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['lokasi'] = $this->lokasiModel->findAll();
        return view('barang/create', $data);
    }

    // Menyimpan barang baru ke database
    public function store()
    {
        // Validasi input
        $validation = $this->validate([
            'nama_barang' => 'required|min_length[3]|max_length[100]',
            'id_kategori' => 'required|integer',
            'id_lokasi'   => 'required|integer',
            'stok'         => 'required|integer',
            'deskripsi'    => 'permit_empty|max_length[255]'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data ke database
        $this->barangModel->save([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_lokasi'   => $this->request->getPost('id_lokasi'),
            'stok'         => $this->request->getPost('stok'),
            'deskripsi'    => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/barang')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan form untuk edit barang
    public function edit($id)
    {
        // Ambil data barang yang ingin diedit
        $data['barang'] = $this->barangModel->find($id);
        
        if (!$data['barang']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang tidak ditemukan');
        }

        // Ambil data kategori dan lokasi
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['lokasi'] = $this->lokasiModel->findAll();

        return view('barang/edit', $data);
    }

    // Menyimpan perubahan barang yang telah diedit
    public function update($id)
    {
        // Validasi input
        $validation = $this->validate([
            'nama_barang' => 'required|min_length[3]|max_length[100]',
            'id_kategori' => 'required|integer',
            'id_lokasi'   => 'required|integer',
            'stok'         => 'required|integer',
            'deskripsi'    => 'permit_empty|max_length[255]'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data barang
        $this->barangModel->update($id, [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_lokasi'   => $this->request->getPost('id_lokasi'),
            'stok'         => $this->request->getPost('stok'),
            'deskripsi'    => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/barang')->with('success', 'Barang berhasil diupdate.');
    }

    // Menghapus barang dari database
    public function delete($id)
    {
        // Hapus barang
        $this->barangModel->delete($id);

        return redirect()->to('/barang')->with('success', 'Barang berhasil dihapus.');
    }
}
