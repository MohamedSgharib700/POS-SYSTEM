<?php

namespace App\Repositories;

use App\Models\Balance;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class BalanceRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $balances = Balance::orderByDesc("id")
            ->when($request->get('name'), function ($balances) use ($request) {
                return $balances->where('name', 'like', '%' . $request->query->get('name') . '%');
            });
        // if ($request->filled('active')) {
        //     $users->where('active', $request->query->get('active'));
        // }


        return $balances;
    }

}
