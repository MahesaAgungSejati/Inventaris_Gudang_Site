<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori', 'deskripsi', 'created_at', 'updated_at'];

    // Method untuk mendapatkan semua kategori
    public function getAllKategori()
    {
        return $this->findAll();
    }

    // Method untuk mendapatkan kategori berdasarkan ID
    public function getKategoriById($id)
    {
        return $this->find($id);
    }
}
