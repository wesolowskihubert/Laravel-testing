<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class TransferHistoryController extends Controller
{
    //wyświetlenie histori transakcji wykodzących
    public function outTransfer()
    {
        $history= DB::table('transfers')
           ->select('*')
           ->where('sender_bank_number', Auth::user()->bank_number)
           ->get();
        return view('sites/outTransferHistory', ['history' => $history]);
    }

    //wyświetlenie histori transakcji przychodzących
    public function inTransfer()
    {
        $history= DB::table('transfers')
            ->select('*')
            ->where('receiver_bank_number', Auth::user()->bank_number)
            ->get();
        return view('sites/inTransferHistory', ['history' => $history]);
    }
}
