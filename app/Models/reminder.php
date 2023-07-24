<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reminder extends Model
{
    use HasFactory;
    // protected $fillable=['date','time','task','status'];
    protected $fillable=['task','date','time','status','completed'];
}
