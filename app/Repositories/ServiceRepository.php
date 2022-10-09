<?php

namespace App\Repositories;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class ServiceRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $services = Service::orderByDesc("id")
            ->when($request->has('name'), function ($services) use ($request) {
                return $services->where('name', '=', $request->get('name'));
            });
        if ($request->filled('active')) {
            $services->where('active', $request->query->get('active'));
        }


        return $services;
    }

}
