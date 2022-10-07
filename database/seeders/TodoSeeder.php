<?php

namespace Database\Seeders;

use App\Models\TodoModel;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TodoModel::factory()->count(config('todos.gen_count'))->create();
    }
}
