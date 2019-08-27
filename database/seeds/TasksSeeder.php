<?php

use App\Task;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['user_id'=> '1', 'name'=>'Rom Event', 'task_date'=>'2017-05-10', 'description' => 'first Description'],
            ['user_id'=> '1','name'=>'Coyala Event', 'task_date'=>'2017-05-11', 'description' => 'second Description'],
            ['user_id'=> '2','name'=>'Lara Event', 'task_date'=>'2017-05-16', 'description' => 'third Description'],
        ];
        foreach ($data as $key => $value) {
            Task::create($value);
        }
    }
}
