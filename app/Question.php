<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'question'
    ];
}
