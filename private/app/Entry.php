<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public function toHtentry()
    {
        return sprintf('Allow from %s', $this->address) . PHP_EOL;
    }
}
