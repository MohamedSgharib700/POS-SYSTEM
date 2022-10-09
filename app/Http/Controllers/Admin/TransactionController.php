<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UploaderService;
use App\Models\Transaction;
use App\Models\Pos;
use App\Http\Services\TransactionService;
use App\Repositories\TransactionRepository;
use App\Repositories\PosRepository;
// use App\Http\Requests\Admin\UserRequest;
use Illuminate\Http\Request;
use View;
class TransactionController extends Controller
{
    protected $transactionService;
    protected $transactionRepository;
    private $uploaderService;

    public function __construct(TransactionService $transactionService, TransactionRepository $transactionRepository , PosRepository $posRepository , UploaderService $uploaderService)
    {
        $this->transactionService = $transactionService;
        $this->transactionRepository = $transactionRepository;
        $this->posRepository = $posrepository ;
        $this->uploaderService = $uploaderService;
    }

    public function index(Request $request)
    {
        $devices = $this->posRepository->search(request())->paginate(10);
        $devices->appends(request()->all());
        return View::make('admin.transactions.index', ['devices' => $devices]);
    }

    public function create(User $user)
    {
        return View::make('admin.users.create');
    }

    public function store(UserRequest $request)
    {
         $this->userService->fillFromRequest($request);
        return redirect(route('users.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(User $user)
    {
        return View::make('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $this->userService->fillFromRequest($request, $user);
        return redirect(route('users.index'))->with('success', trans('item_updated_successfully'));
    }

    public function destroy(User $user)
    {
        $this->uploaderService->deleteFile($user->image);
         $user->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }

    public function show(User $user)
    {
        $this->uploaderService->deleteFile($user->image);
        $user->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }
}
