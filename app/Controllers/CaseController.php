<?php

namespace App\Controllers;

class CaseController extends BaseController
{
    public function details($id)
    {
        $model = new \App\Models\CaseModel();
        $case = $model->find($id);

        if (!$case) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('case_details', ['case' => $case]);
    }

    public function create()
    {
        return view('create_case');
    }
}
