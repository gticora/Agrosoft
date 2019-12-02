<?php

namespace Agrososft;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    //protected $table = 'my_professions';

    //public $timestamps = false;

    protected $fillable = ['title'];

    public function profiles()
    {
        return $this->hasMany(UserProfile::class);
    }
}
