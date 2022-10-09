<?php

namespace App\Repositories;

use App\Models\Pos;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class PosRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $pos = Pos::orderByDesc("id")
            ->when($request->get('machine_code'), function ($pos) use ($request) {
                return $pos->where('machine_code', '=', $request->query->get('machine_code'));
            });
        if ($request->filled('active')) {
            $pos->where('active', $request->query->get('active'));
        }


        return $pos;
    }

}
