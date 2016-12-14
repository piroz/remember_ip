<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Entry;
use App\Task;

class UpdateHtaccess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uphta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update htaccess allow list from db entry';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $task = Task::find(1);
        
        if (0 == $task->flg) {
            return;
        }
        
        $this->line($this->makeEntry());
        
        $task->flg = 0;
        $task->save();
    }
    
    protected function makeEntry()
    {
        $htaccess = <<< EOT
Order deny, allow
Deny from all
Allow from 61.195.153.230

EOT;
        foreach(Entry::all() as $entry) {
            $htaccess .= $entry->toHtentry();
        }

        return $htaccess;
    }
}
