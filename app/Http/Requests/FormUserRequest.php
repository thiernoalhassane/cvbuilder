<?php

namespace App\Http\Requests;

use App\Enum\TypeUser\TypeUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rules\Enum;

class FormUserRequest extends ApiFormRequest
{
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return match ($this->getRequestUri()) {
            '/api/listUser' => $this->listUser(),
            '/api/countUser' => $this->listUser(),
            '/api/updateUser' => $this->update(),
            '/api/createUser' => $this->store(),
            '/api/login' => $this->login(),
            '/api/verifyEmail' => $this->verify(),
            '/api/recoveryPassword' => $this->recovery(),
        };
    }

    public function listUser(): array
    {
        return [
            'type' => [
                'required',
                new Enum(TypeUser::class)
            ]
        ];
    }

    public function update(): array
    {
        return [
            'email' => ['sometimes','email'],
            'name' => ['sometimes','nullable','string'],
            'password' => ['sometimes','string'],
        ];
    }

    public function store(): array
    {
        return [
            'email' => ['required','unique:users','email'],
            'name' => ['required','string'],
            'password' => ['required','string','min:6'],
            'type' => ['required', new Enum(TypeUser::class)],
        ];
    }

    public function login(): array
    {
        return [
            'email' => ['required','email'],
            'password' => ['required','string','min:6'],

        ];
    }

    public function recovery(): array
    {
        return [
            'email' => ['required','email'],
            'password' => ['required','string','min:6'],

        ];
    }

    public function verify(): array
    {
        return [
            'email' => ['required','email'],


        ];
    }



    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }
}
