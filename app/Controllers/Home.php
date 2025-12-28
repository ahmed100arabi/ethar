<?php

namespace App\Controllers;

use App\Models\CaseModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new CaseModel();
        $category = $this->request->getGet('category');
        $city = $this->request->getGet('city');

        // Helper function to apply the same filters to different queries
        $applyFilters = function($builder) use ($category, $city) {
            $builder->where('status', 'approved')
                    ->where('amount_collected < amount_required', null, false);
            
            if ($category) {
                $builder->where('category', $category);
            }
            
            if ($city) {
                $builder->where('city', $city);
            }
            return $builder;
        };

        // 1. Get Critical Cases (Filtered)
        $criticalBuilder = $model->builder();
        $applyFilters($criticalBuilder);
        $criticalCases = $criticalBuilder->where('is_critical', 1)
                                         ->orderBy('approved_at', 'DESC')
                                         ->get()
                                         ->getResultArray();
        
        // 2. Get Random Cases (Filtered)
        $randomBuilder = $model->builder();
        $applyFilters($randomBuilder);
        $randomCases = $randomBuilder->where('is_critical', 0)
                                     ->orderBy('RANDOM()')
                                     ->get()
                                     ->getResultArray();
        
        // Merge results
        $cases = array_merge($criticalCases, $randomCases);

        // 3. Calculate stats for map (also excluding completed cases)
        $db = \Config\Database::connect();
        $query = $db->query("SELECT city, COUNT(*) as count FROM cases WHERE status='approved' AND amount_collected < amount_required GROUP BY city");
        $cityStats = [];
        foreach ($query->getResultArray() as $row) {
            $cityStats[$row['city']] = $row['count'];
        }

        return view('index', [
            'cases' => $cases, 
            'cityStats' => $cityStats,
            'currentCategory' => $category,
            'currentCity' => $city
        ]);
    }
}
