<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UploaderService;
use App\Models\User;
use App\Http\Services\UserService;
use App\Repositories\UserRepository;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Http\Request;
use View;


class UserController extends Controller
{
    protected $userService;
    protected $userRepository;
    private $uploaderService;

    public function __construct(UserService $userService, UserRepository $userRepository, UploaderService $uploaderService)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
        $this->uploaderService = $uploaderService;
    }

    public function index(Request $request)
    {
        $users = $this->userRepository->search(request())->paginate(10);
        $users->appends(request()->all());
        return View::make('admin.users.index', ['users' => $users]);
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
