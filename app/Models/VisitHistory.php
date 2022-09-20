<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitHistory extends Model
{
    protected $table="visit_history";
    protected $fillable = [
        'date',
        'count',

    ];
    public $timestamps = false;
    use HasFactory;
}
