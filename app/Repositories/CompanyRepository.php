<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class CompanyRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $companies = Company::orderByDesc("id")
            ->when($request->get('name'), function ($companies) use ($request) {
                return $companies->where('name', 'like', '%' . $request->query->get('name') . '%');
            });
        if ($request->filled('active')) {
            $companies->where('active', $request->query->get('active'));
        }


        return $companies;
    }

}
