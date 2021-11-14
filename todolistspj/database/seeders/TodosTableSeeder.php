<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => '仕事',
        ];
        DB::table('todos')->insert($param);
        $param = [
            'content' => 'みかん',
        ];
        DB::table('todos')->insert($param);
        $param = [
            'content' => 'ぱそこん',
        ];
        DB::table('todos')->insert($param);
    }
    }
