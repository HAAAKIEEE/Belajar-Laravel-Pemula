<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['id'=>1,'name'=>'Baihaqi','score'=>90],
            ['id'=>2,'name'=>'Rizkan','score'=>70],
            ['id'=>3,'name'=>'Abdur','score'=>80]

        ];

        DB::table('students')->insert($data);
 
    }
}
