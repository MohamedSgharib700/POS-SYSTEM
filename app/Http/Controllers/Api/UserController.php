<?php

namespace App\Http\Controllers\Api;

use App\Http\Services\AuthService;
use App\Models\User;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\ForgotPasswordRequest;
use App\Http\Requests\Api\ProfileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\UserRequest;
use Hash;
use App\Http\Services\UserService;
use Password;
use Symfony\Component\HttpFoundation\Response;
use Mail;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
  
    }

   public function register(Request $request)
    {
        $authService = new AuthService;
        $user = $authService->registerFromRequest($request);
        if($user){
            return response()->json(['result'=>$user]);

        }else{
            return response()->json(['result'=>'This account already exists Please enter another account and make sure you entered the correct data']);
        }
        
    }

    public function login(Request $request)
    {

      if(! auth()->attempt((['email' => request('email'), 'password' => request('password')]))){
       $string =(object)"Please check your email or password";

           return response()->json(['result'=>$string], 400);
       }
       $user =auth()->user();
       return response()->json(['result'=>$user->only(['id', 'name', 'phone', 'email','active','api_token'])],200);
      //return response()->json(['result'=>$user->only(['id', 'name', 'phone', 'email','active','api_token'])],200);
    }


    public function forgetPassword(ForgotPasswordRequest $request)
    {
            $rndmPass = str_random(8);
            $encPass = bcrypt($rndmPass);
            $newPass =  User::where('users.email','=',request('email'))
                ->update(array('password'=>$encPass));
            $data = [
                'password' => $rndmPass,
                'email'=> request('email')
            ];
            Mail::send(['data' => 'mail'], $data, function ($message) use ($data) {
                $message->to($data['email'], 'Forget Password')->subject
                ('AutoMarket Application Password Reset Info.')->setBody($data['password']);
                $message->from('automarket@info.com', 'Support');
            });
            $string =(object)"تم إرسال كلمة المرو الجديدة عبر بريدك الألكترونى";
            return response()->json(['result'=>$string]);
    }

    public function updateProfile(ProfileRequest $request)
    {
        try {
          $user  = $this->userService->updateProfile($request);
          $user = User::where('id','=', $request->input('user_id'))->first();
           
        } catch (\Exception $e) {

            return response()->json($e->getMessage())
                ->setStatusCode($e->getCode());
        }
        return response()->json(['result'=>$user->only(['id', 'name', 'phone', 'email','active' ,'type'])])
            ->setStatusCode(Response::HTTP_OK);
    }

}
