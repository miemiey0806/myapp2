<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mash;

class users extends Seeder
{
    public function run()
    {
        \App\User::create([
            'email'=>'miemiey0806@gmail.com',
            'phone'=>'011-14972927',
            'password'=>Hash::make('cikmiemiey080694')
        ]);

            \App\User::create([
                'email'=>'fafau6@gmail.com',
                'phone'=>'011-14972927',
                'password'=>Hash::make('fafau123')

        ]);

        \App\User::create([
            'email'=>'papa@gmail.com',
            'phone'=>'011-14972927',
            'password'=>Hash::make('papa123')
        ]);

        \App\User::create([
            'email'=>'fifa@gmail.com',
            'phone'=>'011-14972927',
            'password'=>Hash::make('fifa123')
        ]);
    }
}
