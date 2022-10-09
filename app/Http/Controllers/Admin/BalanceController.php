<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UploaderService;
use App\Models\Balance;
use App\Models\Pos;
use App\Http\Services\BalanceService;
use App\Repositories\BalanceRepository;
use App\Repositories\PosRepository;
use App\Http\Requests\Admin\BalanceRequest;
use App\Exports\BalanceExport; 
use Maatwebsite\Excel\Facades\Excel; 
use PDF;
use Illuminate\Http\Request;
use View;

class BalanceController extends Controller
{
    protected $balanceService;
    protected $balanceRepository;
    protected $posRepository;
    private   $uploaderService;

    public function __construct(BalanceService $balanceService , BalanceRepository $balanceRepository, PosRepository $posRepository, UploaderService $uploaderService)
    {
        $this->balanceService = $balanceService;
        $this->balanceRepository = $balanceRepository;
        $this->posRepository = $posRepository ;
        $this->uploaderService = $uploaderService;
    }

    public function index(Request $request)
    {
        $devices = $this->posRepository->search(request())->paginate(30);
        $devices->appends(request()->all());
        return View::make('admin.balances.index', ['devices' => $devices]);
    }

    public function create(Balance $balance , Pos $device)
    {
        return View::make('admin.balances.create' ,['device' => $device]);
    }

    public function store(BalanceRequest $request)
    {
         $this->balanceService->fillFromRequest($request);
        return redirect(route('balances.index'))->with('success', trans('item_added_successfully'));
    }

    public function showRecharges(Pos $device)
    {
        return View::make('admin.balances.show_recharges' ,['device' => $device]);
    }

    public function exportExcel($device){
        return Excel::download(new BalanceExport($device), 'balances.xlsx'); 
    } 

    public function exportPdf(Pos $device){
        
        $pdf = PDF::loadview('admin.balances.pdf_form' ,['device' => $device]);
        return $pdf->download('balances.pdf'); 
    } 
   
}
