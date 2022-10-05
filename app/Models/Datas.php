<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datas extends Model
{
    use HasFactory;

    protected $fillable = ['recipe', 'ingredients', 'directions', 'created_at', 'updated_at'];
}
