<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('sites/profile');
    }

    //zmiana adresu
    public function changeAddress(Request $request)
    {
         DB::table('users')
            ->where('bank_number', Auth::user()->bank_number)
            ->update(['address' => $request->input('newAddres')]);
        return view('sites/updateData');
    }

    //zmiana numeru telefonu
    public function changePhoneNumber(Request $request)
    {
        $validatedData = $request->validate([
            'newPhoneNumber'=> ['required', 'numeric']
        ]);
        DB::table('users')
            ->where('bank_number', Auth::user()->bank_number)
            ->update(['phone_number' => $validatedData['newPhoneNumber']]);
        return view('sites/updateData');
    }

    //zmiana hasła
    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'newPassword'=> ['required', 'string', 'min:8', 'confirmed']
        ]);
        DB::table('users')
            ->where('bank_number', Auth::user()->bank_number)
            ->update(['password' =>Hash::make($validatedData)]);
        return view('sites/updateData');
    }

    //usuwanie konta
    public function deleteAccount()
    {
        DB::table('users')
            ->where('bank_number', Auth::user()->bank_number)
            ->delete();

        Auth::logout();
        return view('auth/login');
    }
}
