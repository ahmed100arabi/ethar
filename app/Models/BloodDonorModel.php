<?php

namespace App\Models;

use CodeIgniter\Model;

class BloodDonorModel extends Model
{
    protected $table = 'blood_donors';
    protected $primaryKey = 'id';
    protected $allowedFields = ['request_id', 'name', 'phone', 'created_at'];
    protected $useTimestamps = false;
}
