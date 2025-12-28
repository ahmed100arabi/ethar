<?php

namespace App\Models;

use CodeIgniter\Model;

class BloodRequestModel extends Model
{
    protected $table = 'blood_requests';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_name', 'blood_type', 'hospital', 'city', 'city_other', 'urgency', 'phone', 'status', 'created_at'];
    protected $useTimestamps = false;
}
