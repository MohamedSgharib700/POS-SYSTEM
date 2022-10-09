<?php

namespace App\Http\Services;

use App\Models\Category;
use Symfony\Component\HttpFoundation\Request;
use Hash ;
class CategoryService
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

    public function fillFromRequest(Request $request, $category = null)
    {
        if (!$category) {
            $category = new Category();
        }

        $category->fill($request->request->all());
        if ($request->method() == 'post') {
            $category->active = $request->request->get('active', 1);
        }
        $category->fill($request->request->all());

        if ($request->hasFile('image')) {
            $category->image = $this->uploaderService->upload($request->file('image'), 'categories');
        }
        $category->save();
        return $category;
    }

}
