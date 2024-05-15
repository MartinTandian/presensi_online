<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAktivitas extends Model{
    protected $table ="aktivitas";
    protected $primaryKey = "id_aktivitas";
    protected $useTimestamps = true;
    protected $allowedFields = ['aktivitas','deskripsi','id_absen','id_user'];

}

