<?php

namespace Database\Seeders;

use App\Models\Opinion;
use Illuminate\Database\Seeder;

class OpinionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opinion::create([
            "articleName"=>"Smth",
            "UserId"=>1,
            "date"=>"2021-04-23 18:29:19",
            "description"=>"asdadasdasd",
        ]);
        //
    }
}
