<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;
use App\Task;

class EntryController extends Controller
{
    public function entry(Request $request)
    {
        $ip = $request->getClientIp();
        
        $row = Entry::where('address', $ip)->get();
        
        if (count($row) < 1) {

            $entry = new Entry();
        
            $entry->address = $request->getClientIp();
            $entry->save();
            
            $task = Task::find(1);
            $task->flg = 1;
            $task->save();
            
            $message = '登録しました。１〜２分後に接続できるようになります';
            
        } else {
            $message = '登録済でした';
        }
        
        return view('complete', compact('message'));
    }
}
