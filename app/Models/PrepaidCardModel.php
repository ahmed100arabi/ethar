<?php

namespace App\Models;

use CodeIgniter\Model;

class PrepaidCardModel extends Model
{
    protected $table            = 'prepaid_cards';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['card_code', 'card_value', 'status', 'used_by_case_id', 'used_at', 'expires_at', 'created_by_admin_id'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    /**
     * Generate a unique card code
     * Format: XXXX-XXXX-XXXX (12 alphanumeric characters)
     */
    public function generateUniqueCode(): string
    {
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; // Removed confusing characters (0,O,1,I)
        
        do {
            $code = '';
            for ($i = 0; $i < 12; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
                if (($i + 1) % 4 === 0 && $i < 11) {
                    $code .= '-';
                }
            }
            
            // Check if code already exists
            $existing = $this->where('card_code', $code)->first();
        } while ($existing);
        
        return $code;
    }

    /**
     * Generate a new prepaid card
     * 
     * @param float $value Card value in LYD
     * @param int $adminId ID of admin creating the card
     * @param string|null $expiresAt Expiration datetime (optional)
     * @return string Generated card code
     */
    public function generateCard(float $value, int $adminId, ?string $expiresAt = null): string
    {
        $code = $this->generateUniqueCode();
        
        $this->save([
            'card_code' => $code,
            'card_value' => $value,
            'status' => 'active',
            'created_by_admin_id' => $adminId,
            'expires_at' => $expiresAt,
        ]);
        
        return $code;
    }

    /**
     * Validate and redeem a card
     * 
     * @param string $code Card code to redeem
     * @param int $caseId Case ID to apply the card to
     * @return array Result with 'success' boolean and 'message' or 'card' data
     */
    public function redeemCard(string $code, int $caseId): array
    {
        // Find the card
        $card = $this->where('card_code', $code)->first();
        
        if (!$card) {
            return [
                'success' => false,
                'message' => 'الكرت غير موجود'
            ];
        }
        
        // Check if already used
        if ($card['status'] !== 'active') {
            return [
                'success' => false,
                'message' => 'هذا الكرت مستخدم بالفعل أو منتهي الصلاحية'
            ];
        }
        
        // Check expiration
        if ($card['expires_at'] && strtotime($card['expires_at']) < time()) {
            $this->update($card['id'], ['status' => 'expired']);
            return [
                'success' => false,
                'message' => 'الكرت منتهي الصلاحية'
            ];
        }
        
        // Mark as used
        $this->update($card['id'], [
            'status' => 'used',
            'used_by_case_id' => $caseId,
            'used_at' => date('Y-m-d H:i:s')
        ]);
        
        return [
            'success' => true,
            'card' => $card
        ];
    }
}
