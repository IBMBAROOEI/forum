<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['sometimes', 'image', 'mimes:jpg,jpeg,bmp,svg,png', 'max:5000'],
            recaptchaFieldName() => recaptchaRuleName()

        ]);
    }

    protected function create( array $data )
    {
        if (request()->hasFile('avatar')) {
            if (request()->hasFile('avatar')) {
                $file = request()->file('avatar');
                $name=time().$file->getClientOriginalName();
                $filePath = 'images/' . $name;
                \Storage::disk('public')->put($filePath, file_get_contents($file));

            }
            $user=User::create([
                'name' => $data['name'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'avatar'=>    $name,
                'password' => \Hash::make($data['password']),

            ]);
            $user->assignRole('users'); //assign role to user
        }
return $user;
    }


}

