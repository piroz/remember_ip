<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Entry;
use App\Task;
use File;

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
     * @var string updated htaccess
     */
    protected $outputFile = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->outputFile = env('OUTPUT_HTACCESS', storage_path('logs/htaccess'));
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
        
        $this->writeToFile($this->makeEntry());
        
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
    
    protected function writeToFile($contents)
    {
        $bytes_written = File::put($this->outputFile, $contents);
        
        if ($bytes_written === false)
        {
            $this->error(sprintf('Error writing to file `%s`', $this->outputFile));
        }
    }
}
