<?php

namespace Agrososft;
use Agrososft\{Cargo, Skill, User};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class)->withDefault([
            'title' => '(Sin cargo)'
        ]);
    }
}
