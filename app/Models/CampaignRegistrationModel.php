<?php

namespace App\Models;

use CodeIgniter\Model;

class CampaignRegistrationModel extends Model
{
    protected $table = 'campaign_registrations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['campaign_id', 'name', 'phone', 'created_at'];
    protected $useTimestamps = false;
}
