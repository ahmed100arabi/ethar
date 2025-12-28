<?php

namespace App\Models;

use CodeIgniter\Model;

class FakeCardModel extends Model
{
    protected $DBGroup          = 'fake_cards';
    protected $table            = 'fake_cards';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['card_number', 'expiry', 'cvv', 'balance', 'card_holder', 'status'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Validate card details and check if card exists and is active
     */
    public function validateCard($cardNumber, $expiry, $cvv)
    {
        $card = $this->where('card_number', $cardNumber)
                     ->where('expiry', $expiry)
                     ->where('cvv', $cvv)
                     ->first();

        if (!$card) {
            return [
                'success' => false,
                'message' => 'بيانات البطاقة غير صحيحة'
            ];
        }

        if ($card['status'] === 'blocked') {
            return [
                'success' => false,
                'message' => 'هذه البطاقة محظورة'
            ];
        }

        return [
            'success' => true,
            'card' => $card
        ];
    }

    /**
     * Check if card has sufficient balance
     */
    public function checkBalance($cardId, $amount)
    {
        $card = $this->find($cardId);
        
        if (!$card) {
            return false;
        }

        return $card['balance'] >= $amount;
    }

    /**
     * Deduct amount from card balance
     */
    public function deductBalance($cardId, $amount)
    {
        $card = $this->find($cardId);
        
        if (!$card || $card['balance'] < $amount) {
            return false;
        }

        $newBalance = $card['balance'] - $amount;
        return $this->update($cardId, ['balance' => $newBalance]);
    }

    /**
     * Get card balance
     */
    public function getBalance($cardId)
    {
        $card = $this->find($cardId);
        return $card ? $card['balance'] : 0;
    }
}
