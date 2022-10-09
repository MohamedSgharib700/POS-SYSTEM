<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class CategoryRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $categories = Category::orderByDesc("id")
            ->when($request->get('name'), function ($categories) use ($request) {
                return $categories->where('name', 'like', '%' . $request->query->get('name') . '%');
            });
        // if ($request->filled('active')) {
        //     $users->where('active', $request->query->get('active'));
        // }


        return $categories;
    }

}
