<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';

    protected $fillable = [
        'name',
        'birth_place',
        'birth_date',
        'address'
    ];

    public $timestamps = true;

    public function grades()
    {
        return $this->hasMany('App\Grade');
    }
}
