<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class MakeTransferController extends Controller
{
    public function index()
    {
        return view('sites/makeTransfer');
    }

    //wykonywanie przelewu
    public function makeTransfer(Request $request)
    {
        $x= Auth::user()->balance - $request->input('amount');

        $bank_number_exist=DB::table('users')
            ->select('bank_number')
            ->where('bank_number', $request->input('receiver_bank_number'))
            ->get();

        if($bank_number_exist->count()>0)
        {
            if ($x >= 0)
            {
                DB::table('users')
                    ->where('bank_number', Auth::user()->bank_number)
                    ->update(['balance' => $x]);

                $y = DB::table('users')
                    ->select('balance')
                    ->where('bank_number', $request->input('receiver_bank_number'))
                    ->value('balance');

                $y += $request->input('amount');

                DB::table('users')
                    ->where('bank_number', $request->input('receiver_bank_number'))
                    ->update(['balance' => $y]);

                DB::table('transfers')->insert([
                    'sender_name' => Auth::user()->name,
                    'sender_surname' => Auth::user()->surname,
                    'sender_bank_number' => Auth::user()->bank_number,
                    'receiver_name' => $request->input('receiver_name'),
                    'receiver_surname' => $request->input('receiver_surname'),
                    'receiver_bank_number' => $request->input('receiver_bank_number'),
                    'desc' => $request->input('desc'),
                    'amount' => $request->input('amount')
                ]);

                return view('sites/thanke');

            } else
            {
                return view('sites/ohNo', ['error' => 'Brak wystarczających środków na koncie']);
            }
        } else
        {
            return view('sites/ohNo', ['error' => 'Nie ma takiego numeru konta']);
        }

    }
}
