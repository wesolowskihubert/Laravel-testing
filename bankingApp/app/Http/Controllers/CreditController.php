<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreditController extends Controller
{
    //zabezpieczenie przed przejściem bez konta standart na stronę
    public  function index()
    {
        if(Auth::user()->account_type!="Konto standard")
        {
            return redirect('home');
        }else
        {
            return view("sites/credit");
        }
    }
    public  function index2()
    {
        if(Auth::user()->account_type!="Konto standard")
        {
            return redirect('home');
        }else
        {
            return view("sites/refundCredit");
        }
    }

    //pobieranie kredytu
    public function takeCredit(Request $request)
    {
        if(Auth::user()->credit<=0)
        {
            if($request->input('takeCredit')>0)
            {
                DB::table('users')
                    ->where('bank_number', Auth::user()->bank_number)
                    ->update([
                        'credit' => $request->input('takeCredit') * 1.2,
                        'balance' => Auth::user()->balance + $request->input('takeCredit')
                    ]);
                return view('sites/ohNo', ['error' => 'Dodano kredyt']);
            }else
            {
                return view('sites/ohNo', ['error' => 'Podana kwota musi być większa od 0']);
            }
        }else
        {
            return view('sites/ohNo', ['error' => 'Musisz spłacić obecny kredyt']);
        }
    }

    //zwracanie kredytu
    public function refundCredit(Request $request)
    {
        if(Auth::user()->balance>=$request->input('refundCredit'))
        {
            if (Auth::user()->credit >= $request->input('refundCredit'))
            {
                if (Auth::user()->credit>0)
                {
                    $x = Auth::user()->credit - $request->input('refundCredit');

                    DB::table('users')
                        ->where('bank_number', Auth::user()->bank_number)
                        ->update([
                            'credit' => $x,
                            'balance' => Auth::user()->balance - $request->input('refundCredit'),
                        ]);
                    return view('sites/ohNo', ['error' => 'Spłacono ratę kredytu']);
                }else
                {
                    return view('sites/ohNo', ['error' => 'Wpłacona kwota musi być większa od zera']);
                }

            }else
              {
                return view('sites/ohNo', ['error' => 'Wpłacona kwota jest większa niż kredyt do spłaty']);
              }
        }else
        {
            return view('sites/ohNo', ['error' => 'Brak wystarczających środków na koncie']);
        }
    }
}
