<?php

namespace App\Models;

use CodeIgniter\Model;

class MDivisi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'divisi';
    protected $primaryKey       = 'id_divisi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [];

}
