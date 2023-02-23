<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:80',
                Rule::unique(User::class),
            ],
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'rol_id_fk'=>['required',Rule::in(2,3)],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'username' => $input['username'],
            'rol_id_fk'=>$input['rol_id_fk'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
