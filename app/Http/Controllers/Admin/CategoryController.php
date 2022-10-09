<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UploaderService;
use App\Models\Category;
use App\Http\Services\CategoryService;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use View;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $categoryRepository;
    private   $uploaderService;

    public function __construct(CategoryService $categoryService, CategoryRepository $categoryRepository, UploaderService $uploaderService)
    {
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
        $this->uploaderService = $uploaderService;
    }

    public function index(Request $request)
    {
        $list = $this->categoryRepository->search(request())->paginate(30);
        $list->appends(request()->all());
        return View::make('admin.categories.index', ['list' => $list]);
    }

    public function create(Category $category)
    {
        return View::make('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
         $this->categoryService->fillFromRequest($request);
        return redirect(route('categories.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(Category $category)
    {
        return View::make('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $this->categoryService->fillFromRequest($request, $category);
        return redirect(route('categories.index'))->with('success', trans('item_updated_successfully'));
    }

    public function destroy(Category $category)
    {
        // $this->uploaderService->deleteFile($category->image);
         $category->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }

    public function show(Category $category)
    {
        // $this->uploaderService->deleteFile($user->image);
        $category->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }
}
