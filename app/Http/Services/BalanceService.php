<?php

namespace App\Http\Services;

use App\Models\Balance;
use Symfony\Component\HttpFoundation\Request;
use Hash ;
class BalanceService
{

    private $uploaderService;

    /**
     * UserService constructor.
     * @param UploaderService $uploaderService
     */
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fillFromRequest(Request $request, $balance = null)
    {
        if (!$balance) {
            $balance = new Balance();
        }

        $balance->fill($request->request->all());
        if ($request->method() == 'post') {
            // $user->active = $request->request->get('active', 1);
        }
        $balance->fill($request->request->all());
        $balance->save();
        return $balance;
    }

}
