<?php

namespace App\Models;

use CodeIgniter\Model;

class SiteWalletModel extends Model
{
    protected $table            = 'site_wallet';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['balance', 'total_collected', 'last_transaction_at'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Add balance to site wallet
     */
    public function addBalance($amount, $source = 'payment')
    {
        $wallet = $this->find(1);
        
        if (!$wallet) {
            // Create wallet if doesn't exist
            $this->insert([
                'id' => 1,
                'balance' => $amount,
                'total_collected' => $amount,
                'last_transaction_at' => date('Y-m-d H:i:s')
            ]);
            return true;
        }

        $newBalance = $wallet['balance'] + $amount;
        $newTotal = $wallet['total_collected'] + $amount;

        return $this->update(1, [
            'balance' => $newBalance,
            'total_collected' => $newTotal,
            'last_transaction_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Get current wallet balance
     */
    public function getBalance()
    {
        $wallet = $this->find(1);
        return $wallet ? $wallet['balance'] : 0;
    }

    /**
     * Get total collected amount
     */
    public function getTotalCollected()
    {
        $wallet = $this->find(1);
        return $wallet ? $wallet['total_collected'] : 0;
    }

    /**
     * Get wallet stats
     */
    public function getStats()
    {
        $wallet = $this->find(1);
        
        if (!$wallet) {
            return [
                'balance' => 0,
                'total_collected' => 0,
                'last_transaction_at' => null
            ];
        }

        return $wallet;
    }
}
