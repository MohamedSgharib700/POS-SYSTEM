<?php

namespace App\Http\Services;

use App\Models\Location;
use Symfony\Component\HttpFoundation\Request;
use Hash ;
class LocationService
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

    public function fillFromRequest(Request $request, $location = null)
    {
        if (!$location) {
            $location = new Location();
        }

        $location->fill($request->request->all());
        if ($request->method() == 'post') {
            // $user->active = $request->request->get('active', 1);
        }
        $location->fill($request->request->all());
 
        // if ($request->hasFile('image')) {
        //     $user->image = $this->uploaderService->upload($request->file('image'), 'users');
        // }
        $location->save();
        return $location;
    }

}
