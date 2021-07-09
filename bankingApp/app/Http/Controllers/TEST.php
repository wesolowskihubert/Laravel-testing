<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TEST extends Controller
{
    public function index()
    {
        $bankNumber= DB::table('users')
            ->select('bank_number', 'name', 'surname')
            ->get();


        foreach ($bankNumber as $bn)
        {
            $rand=mt_rand(0,count($bankNumber)-1);

            DB::table('transfers')
                ->insert([
                    'sender_name'=>$bn->name,
                    'sender_surname'=>$bn->surname,
                    'sender_bank_number'=>$bn->bank_number,
                    'receiver_name'=>$bankNumber[$rand]->name,
                    'receiver_surname'=>$bankNumber[$rand]->surname,
                    'receiver_bank_number'=>$bankNumber[$rand]->bank_number
                ]);
        }
        return 0;
    }
}
