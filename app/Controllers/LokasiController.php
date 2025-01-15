<?php

namespace App\Controllers;

use App\Models\LokasiModel;

class LokasiController extends BaseController
{
    protected $lokasiModel;

    public function __construct()
    {
        $this->lokasiModel = new LokasiModel();
    }

    // Menampilkan semua lokasi
    public function index()
    {
        $data['lokasi'] = $this->lokasiModel->getAllLokasi();
        return view('lokasi/index', $data);
    }

    // Menampilkan form tambah lokasi
    public function create()
    {
        return view('lokasi/create');
    }

    // Menyimpan lokasi baru ke database
    public function store()
    {
        $validation = $this->validate([
            'nama_lokasi' => 'required|min_length[3]|max_length[100]',
            'deskripsi'   => 'permit_empty|max_length[255]'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->lokasiModel->save([
            'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            'deskripsi'   => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/lokasi')->with('success', 'Lokasi berhasil ditambahkan.');
    }

    // Menampilkan form edit lokasi
    public function edit($id)
    {
        $data['lokasi'] = $this->lokasiModel->getLokasiById($id);

        if (!$data['lokasi']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Lokasi dengan ID $id tidak ditemukan.");
        }

        return view('lokasi/edit', $data);
    }

    // Menyimpan perubahan lokasi ke database
    public function update($id)
    {
        $validation = $this->validate([
            'nama_lokasi' => 'required|min_length[3]|max_length[100]',
            'deskripsi'   => 'permit_empty|max_length[255]'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->lokasiModel->update($id, [
            'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            'deskripsi'   => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/lokasi')->with('success', 'Lokasi berhasil diperbarui.');
    }

    // Menghapus lokasi
    public function delete($id)
    {
        $lokasi = $this->lokasiModel->getLokasiById($id);

        if (!$lokasi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Lokasi dengan ID $id tidak ditemukan.");
        }

        $this->lokasiModel->delete($id);

        return redirect()->to('/lokasi')->with('success', 'Lokasi berhasil dihapus.');
    }
}
