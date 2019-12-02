<?php

namespace Agrososft\Http\Requests;

use Agrososft\Role;
use Agrososft\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => [
                'required', 'email',
                Rule::unique('users')->ignore($this->user)
            ],
            'password' => '',
            'role' => [Rule::in(Role::getList())],
            'bio' => 'required',
            'twitter' => ['nullable', 'present', 'url'],
            'cargo_id' => [
                'nullable', 'present',
                Rule::exists('cargos', 'id')->whereNull('deleted_at')
            ],
            'skills' => [
                'array',
                Rule::exists('skills', 'id'),
            ],
        ];
    }

    public function updateUser(User $user)
    {
        $user->fill([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ]);

        if ($this->password != null) {
            $user->password = bcrypt($this->password);
        }

        $user->save();

        $user->profile->update([
            'twitter' => $this->twitter,
            'bio' => $this->bio,
            'cargo_id' => $this->cargo_id,
        ]);

        $user->skills()->sync($this->skills ?: []);
    }
}
