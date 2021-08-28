<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;

class ExercisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'test1',
            'email' => 'test1@example.com',
            'profile'  => 'test1'
        ];
        $exercise = new Exercise;
        $exercise->fill($param)->save();

        $param = [
            'name' => 'test2',
            'email' => 'test2@example.com',
            'profile'  => 'test2'
        ];
        $exercise = new Exercise;
        $exercise->fill($param)->save();

        $param = [
            'name' => 'test3',
            'email' => 'test3@example.com',
            'profile'  => 'test3'
        ];
        $exercise = new Exercise;
        $exercise->fill($param)->save();
    }
}
