<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker as Faker;

class TransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $bankNumber= DB::table('users')
            ->select('bank_number', 'name', 'surname')
            ->get();

        $faker = Faker\Factory::create();
        for ($i=0;$i<3;$i++)
        {
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
                        'receiver_bank_number'=>$bankNumber[$rand]->bank_number,
                        'amount'=> $faker->numberBetween(1,1000),
                        'desc'=>$faker->sentence(6,true),
                        'transfer_date'=>$faker->dateTimeBetween('-5 years',now()),
                    ]);
            }
        }
    }
}
