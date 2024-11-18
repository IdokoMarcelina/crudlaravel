<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class myTask extends Model
{
    protected $table = "mytask";
    protected $fillable = ['name', 'content'];
}
