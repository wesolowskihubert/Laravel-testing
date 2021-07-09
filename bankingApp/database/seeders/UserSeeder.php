<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //Funkcja generująca bank number
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

    //Funkcja generująca typ konta na podstawie wieku
    public function accountType($date_diffrence)
    {
        $today=Carbon::now();

        $difference=$today->diffInDays($date_diffrence, false)*-1;
        if($difference>=18*365)
            return  "Konto standard";
        else
            return "Konto dziecięce";
    }

    //Funkcja generująca testowe dane użytkowników
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,10)as $index)
        {
           $birthDate=$faker->date("Y-m-d");

            DB::table('users')->insert([
                'name'=> $faker->firstName,
                'surname'=>  $faker->lastName,
                'phone_number' => $faker->randomNumber(9),
                'address'=> $faker->address,
                'bank_number' => $this->generateBankNumber(),
                'credit_card_number'=>$this-> generateBankNumber(),
                'balance'=>$faker->numberBetween(0,5000),
                'account_type'=>$this->accountType($birthDate),
                'credit'=>0,
                'birth_date'=> $birthDate,
                'email'=>$faker->unique()->safeEmail,
                'password'=> Hash::make('testtest')
            ]);
        }
    }
}
