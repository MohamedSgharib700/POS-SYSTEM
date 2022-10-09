<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UploaderService;
use App\Models\Location;
use App\Http\Services\LocationService;
use App\Repositories\LocationRepository;
use App\Http\Requests\Admin\LocationRequest;
use Illuminate\Http\Request;
use View;

class LocationController extends Controller
{
    protected $locationService;
    protected $locationRepository;
    private $uploaderService;

    public function __construct(LocationService $locationService, LocationRepository $locationRepository, UploaderService $uploaderService)
    {
        $this->locationService = $locationService;
        $this->locationRepository = $locationRepository;
        $this->uploaderService = $uploaderService;
    }

    public function index(Request $request)
    {
        $locations = $this->locationRepository->search(request())->paginate(10);
        $locations->appends(request()->all());
        return View::make('admin.locations.index', ['locations' => $locations]);
    }

    public function create(Location $location)
    {
        return View::make('admin.locations.create');
    }

    public function store(LocationRequest $request)
    {
         $this->locationService->fillFromRequest($request);
        return redirect(route('locations.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(Location $location)
    {
        return View::make('admin.locations.edit', ['location' => $location]);
    }

    public function update(Request $request, Location $location)
    {
        $this->locationService->fillFromRequest($request, $location);
        return redirect(route('locations.index'))->with('success', trans('item_updated_successfully'));
    }

    public function destroy(Location $location)
    {
         $location->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }

    public function show(Location $location)
    {
        return View::make('admin.locations.show', ['location' => $location]);
    }

}
