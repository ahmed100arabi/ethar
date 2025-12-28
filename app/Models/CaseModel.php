<?php

namespace App\Models;

use CodeIgniter\Model;

class CaseModel extends Model
{
    protected $table            = 'cases';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'title', 'category', 'city', 'city_other', 'description', 'amount_required', 'amount_collected', 'image', 'status', 'priority', 'patient_nickname', 'approved_at', 'is_critical'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
