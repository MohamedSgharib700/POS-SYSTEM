<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UploaderService;
use App\Models\Pos;
use App\Http\Services\PosService;
use App\Repositories\PosRepository;
use App\Repositories\UserRepository;
use App\Http\Requests\Admin\PosRequest;
use Illuminate\Http\Request;
use View;

class PosController extends Controller
{
    protected $posService;
    protected $posRepository;
    protected $userRepository;
    private   $uploaderService;

    public function __construct(PosService $posService, PosRepository $posRepository, UserRepository $userRepository, UploaderService $uploaderService)
    {
        $this->posService = $posService;
        $this->posRepository = $posRepository;
        $this->userRepository = $userRepository;
        $this->uploaderService = $uploaderService;
    }

    public function index(Request $request)
    {
        $devices = $this->posRepository->search(request())->paginate(30);
        $devices->appends(request()->all());
        return View::make('admin.pos.index', ['devices' => $devices]);
    }

    public function create(Pos $devices)
    {
        $users = $this->userRepository->search(request())->get();
        return View::make('admin.pos.create' , ['users' => $users]);
    }

    public function store(PosRequest $request)
    {
         $this->posService->fillFromRequest($request);
        return redirect(route('devices.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(Pos $device)
    {
        $users = $this->userRepository->search(request())->get();
        return View::make('admin.pos.edit', ['device' => $device , 'users' => $users]);
    }

    public function update(PosRequest $request, Pos $device)
    {
        $this->posService->fillFromRequest($request, $device);
        return redirect(route('devices.index'))->with('success', trans('item_updated_successfully'));
    }

    public function destroy(Pos $device)
    {
        $this->uploaderService->deleteFile($device->image);
         $device->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }

    public function show(Pos $device)
    {
        $this->uploaderService->deleteFile($device->image);
         $device->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }
}
