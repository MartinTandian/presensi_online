<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAbsen extends Model{
    protected $table ="absen";
    protected $primaryKey ="id_absen";
    protected $useTimestamps = true;
    protected $allowedFields = ['tanggal','clock_in','clock_out','id_user','total_jam','nilai_total_jam'];

    public function get_presensi($tanggal_awal, $tanggal_akhir)
    {
        $query = $this->db->table('absen')
                          ->where('tanggal >=', $tanggal_awal)
                          ->where('tanggal <=', $tanggal_akhir)
                          ->get();

        return $query->getResultArray();
    }
}


