<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = "users";
    protected $primaryKey = "id_user";
    protected $useTimestamps = true;
    protected $usesoftdeleted = true;
    protected $allowedFields = ['nama', 'email', 'id_divisi', 'nama_divisi', 'id_role', 'nama_role', 'username', 'password', 'asal', 'pilih', 'pembimbing', 'id_user', 'tanggal_mulai', 'tanggal_selesai'];
}
