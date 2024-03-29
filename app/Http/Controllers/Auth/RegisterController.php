<?php

namespace App\Http\Controllers\Auth;

use App\Services\TenantService;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Tenant\Events\TenantCreated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'min:4', 'max:255'],
            'email'    => ['required', 'string', 'email', 'min:5', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:16', 'confirmed'],
            'cnpj'     => ['required', 'min:3', 'max:20', 'unique:tenants'],
            'empresa'  => ['required', 'unique:tenants,name'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (!$plan = session('plan')) {
            return redirect()->route('site.home');
        }
        
        $tenantService = app(TenantService::class);
        $user = $tenantService->make($plan, $data);

        event(new TenantCreated($user));

        return $user;
    }
}
