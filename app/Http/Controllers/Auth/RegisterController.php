<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required'],
            'nacionalidade' => ['required'],
            'estadoCivil' => ['required'],
            'profissao' => ['required'],
            'logradouro' => ['required'],
            'numero' => ['required'],
            'bairro' => ['required'],
            'cep' => ['required'],
            'cidade' => ['required'],
            'estado' => ['required'],
            'password' => ['required', 'string', 'confirmed'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'nacionalidade' => $data['nacionalidade'],
            'estadoCivil' => $data['estadoCivil'],
            'profissao' => $data['profissao'],
            'logradouro' => $data['logradouro'],
            'numero' => $data['numero'],
            'bairro' => $data['bairro'],
            'cep' => $data['cep'],
            'cidade' => $data['cidade'],
            'estado' => $data['estado'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
