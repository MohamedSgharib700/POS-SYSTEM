<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\UploaderService;
use App\Http\Services\ServiceService;
use App\Repositories\ServiceRepository;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Admin\ServiceRequest;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use View;

class ServiceController extends Controller
{
    protected $serviceService;
    protected $serviceRepository;
    protected $categoryRepository;
    private $uploaderService;

    public function __construct(ServiceService $serviceService, ServiceRepository $serviceRepository, CategoryRepository $categoryRepository, UploaderService $uploaderService)
    {
        $this->serviceService = $serviceService;
        $this->serviceRepository = $serviceRepository;
        $this->categoryRepository = $categoryRepository;
        $this->uploaderService = $uploaderService;
    }

    public function index(Request $request)
    {
        $services = $this->serviceRepository->search(request())->paginate(10);
        $services->appends(request()->all());
        return View::make('admin.services.index', ['services' => $services]);
    }

    public function create(Service $service)
    {
        $categories = $this->categoryRepository->search(request())->get();
        return View::make('admin.services.create', ['categories' => $categories]);
    }

    public function store(ServiceRequest $request)
    {
         $this->serviceService->fillFromRequest($request);
        return redirect(route('services.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(Service $service)
    {
        $categories = $this->categoryRepository->search(request())->get();
        return View::make('admin.services.edit', ['service' => $service ,'categories' => $categories]);
    }

    public function update(Request $request, Service $service)
    {
        $this->serviceService->fillFromRequest($request, $service);
        return redirect(route('services.index'))->with('success', trans('item_updated_successfully'));
    }

    public function destroy(Service $service)
    {
        $this->uploaderService->deleteFile($service->image);
         $service->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }

    public function show(Service $service)
    {
        $this->uploaderService->deleteFile($service->image);
        $service->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }
}
