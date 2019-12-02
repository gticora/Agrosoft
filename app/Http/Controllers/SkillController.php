<?php

namespace Agrososft\Http\Controllers;

use Agrososft\Skill;

class SkillController extends Controller
{
    public function index()
    {
        return view('skills.index', [
            'skills' => Skill::orderBy('name')->get(),
        ]);
    }
}
