<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class GroupRemoveUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'group' => [
                'required',
                function ($attribute, $value, $fail) {
                    $id = Auth::user()->id ?? null;
                    if ($id === null || User::find($id)->groups()->where('group_id', $value)->count() === 0) {
                        $fail('User has no rights to this group because their not a member');
                    }
                },
            ]
        ];
    }
}
