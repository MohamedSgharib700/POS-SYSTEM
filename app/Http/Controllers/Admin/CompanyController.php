<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UploaderService;
use App\Models\Company;
use App\Http\Services\CompanyService;
use App\Repositories\CompanyRepository;
use App\Http\Requests\Admin\CompanyRequest;
use Illuminate\Http\Request;
use View;

class CompanyController extends Controller
{
    protected $companyService;
    protected $companyRepository;
    private   $uploaderService;

    public function __construct(CompanyService $companyService, CompanyRepository $companyRepository, UploaderService $uploaderService)
    {
        $this->companyService = $companyService;
        $this->companyRepository = $companyRepository;
        $this->uploaderService = $uploaderService;
    }

    public function index(Request $request)
    {
        $companies = $this->companyRepository->search(request())->paginate(30);
        $companies->appends(request()->all());
        return View::make('admin.companies.index', ['companies' => $companies]);
    }

    public function create(Company $company)
    {
        return View::make('admin.companies.create');
    }

    public function store(companyRequest $request)
    {
         $this->companyService->fillFromRequest($request);
        return redirect(route('companies.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(Company $company)
    {
        return View::make('admin.companies.edit', ['company' => $company]);
    }

    public function update(companyRequest $request, Company $company)
    {
        $this->companyService->fillFromRequest($request, $company);
        return redirect(route('companies.index'))->with('success', trans('item_updated_successfully'));
    }

    public function destroy(Company $company)
    {
        $this->uploaderService->deleteFile($company->image);
         $company->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }

    public function show(Company $company)
    {
        $this->uploaderService->deleteFile($company->image);
         $company->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }
}
