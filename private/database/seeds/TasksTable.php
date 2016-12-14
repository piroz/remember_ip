<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Task();
        
        $task->id = 1;
        $task->flg = 0;
        
        $task->save();
    }
}
