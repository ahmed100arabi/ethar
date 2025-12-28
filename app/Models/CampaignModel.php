<?php

namespace App\Models;

use CodeIgniter\Model;

class CampaignModel extends Model
{
    protected $table = 'campaigns';
    protected $primaryKey = 'id';
    protected $allowedFields    = ['title', 'description', 'event_date', 'location', 'user_id', 'status', 'image'];
    protected $useTimestamps = false; // We handle created_at manually if needed, or let DB handle it
}
