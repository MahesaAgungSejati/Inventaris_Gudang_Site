<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['nama_barang', 'deskripsi', 'stok', 'id_kategori', 'id_lokasi', 'created_at', 'updated_at'];

    // Method untuk mendapatkan semua barang dengan join ke kategori dan lokasi
    public function getAllBarang()
    {
        return $this->select('barang.*, kategori.nama_kategori, lokasi.nama_lokasi')
                    ->join('kategori', 'kategori.id_kategori = barang.id_kategori')
                    ->join('lokasi', 'lokasi.id_lokasi = barang.id_lokasi')
                    ->findAll();
    }

    // Method untuk mendapatkan barang berdasarkan ID
    public function getBarangById($id)
    {
        return $this->select('barang.*, kategori.nama_kategori, lokasi.nama_lokasi')
                    ->join('kategori', 'kategori.id_kategori = barang.id_kategori')
                    ->join('lokasi', 'lokasi.id_lokasi = barang.id_lokasi')
                    ->find($id);
    }
}
