<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembimbing extends Model
{
    protected $table = "pembimbing";
    protected $primaryKey = "NIPEG";
    protected $useTimestamps = true;
    protected $allowedFields = ['NAMA', 'E_MAIL', 'KDKERJ', 'password'];
}
