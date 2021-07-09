<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
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
            'name' => ['required', 'string', 'max:30'],
            'surname'=>['required', 'string', 'max:50'],
            'phone_number'=>['required', 'numeric'],
            'address'=>['required', 'string', 'max:80'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birth_date'=>['required', 'date'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            'name.required' =>'To pole jest wymagane',
            'surname.required' => 'To pole jest wymagane',
            'phone_number.required' => 'To pole jest wymagane',
            'address.required' => 'To pole jest wymagane',
            'email.required' => 'To pole jest wymagane',
            'birth_date.required' => 'To pole jest wymagane',
            'password.required' => 'To pole jest wymagane',

            'name.max' => 'Wprowadzone imię jest zbyt długie',
            'surname.max' => 'Wprowadzone nazwisko jest zbyt długie',
            'address.max' => 'Wprowadzony addres jest zbyt długi',
            'email.max' => 'Wprowadzony addres email jest zbyt długi',

            'password.min' => 'Wprowadzone hasło jest zbyt krótkie',

            'birth_date.date' =>'Nieprawidłowy format',
            'birth_date.email' =>'Nieprawidłowy format',
            'phone_number.email' =>'Nieprawidłowy format'
        ]);
    }

    public function generateBankNumber()
    {
        $bankNumber=mt_rand(10000000000, 99999999999);
        $x=DB::table('users')
            ->select('bank_number')
            ->where('bank_number', $bankNumber)
            ->value('bank_number');

        if($x==$bankNumber)
            return $this->generateBankNumber();

        else return $bankNumber;
    }

    public function accountType($date_diffrence)
    {
        $today=Carbon::now();

        $difference=$today->diffInDays($date_diffrence, false)*-1;
        if($difference>=18*365)
            return  "Konto standard";
        else
            return "Konto dziecięce";
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'surname'=>$data['surname'],
            'phone_number'=>$data['phone_number'],
            'address'=>$data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birth_date'=>$data['birth_date'],
            'account_type'=>$this->accountType($data['birth_date']),
            'bank_number' => $this->generateBankNumber()
        ]);
    }
}
