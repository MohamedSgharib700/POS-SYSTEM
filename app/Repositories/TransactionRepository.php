<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class TransactionRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $transactions = Transaction::orderByDesc("id")
            ->when($request->has('user_service_number'), function ($transactions) use ($request) {
                return $transactions->where('user_service_number', '=', (int)$request->get('user_service_number'));
            });
        return $transactions;
    }

}
