<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey = 'id_lokasi';
    protected $allowedFields = ['nama_lokasi', 'deskripsi', 'created_at', 'updated_at'];

    // Method untuk mendapatkan semua lokasi
    public function getAllLokasi()
    {
        return $this->findAll();
    }

    // Method untuk mendapatkan lokasi berdasarkan ID
    public function getLokasiById($id)
    {
        return $this->find($id);
    }
}
