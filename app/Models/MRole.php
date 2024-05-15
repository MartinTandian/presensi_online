<?php

namespace App\Models;

use CodeIgniter\Model;

class MRole extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'role';
    protected $primaryKey       = 'id_role';
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [];

  
}
