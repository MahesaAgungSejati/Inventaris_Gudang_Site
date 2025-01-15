<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    // Menampilkan semua kategori
    public function index()
    {
        $data['kategori'] = $this->kategoriModel->getAllKategori();
        return view('kategori/index', $data);
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('kategori/create');
    }

    // Menyimpan kategori baru ke database
    public function store()
    {
        $validation = $this->validate([
            'nama_kategori' => 'required|min_length[3]|max_length[100]',
            'deskripsi'     => 'permit_empty|max_length[255]'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi'     => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $data['kategori'] = $this->kategoriModel->getKategoriById($id);

        if (!$data['kategori']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Kategori dengan ID $id tidak ditemukan.");
        }

        return view('kategori/edit', $data);
    }

    // Menyimpan perubahan kategori
    public function update($id)
    {
        $validation = $this->validate([
            'nama_kategori' => 'required|min_length[3]|max_length[100]',
            'deskripsi'     => 'permit_empty|max_length[255]'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi'     => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/kategori')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function delete($id)
    {
        $kategori = $this->kategoriModel->getKategoriById($id);

        if (!$kategori) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Kategori dengan ID $id tidak ditemukan.");
        }

        $this->kategoriModel->delete($id);

        return redirect()->to('/kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
