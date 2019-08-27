<?php
namespace App\Http\Requests\Authors;
use Illuminate\Http\Request;

class StoreAuthorRequest extends Request
{
    public function rules()
    {
        $rules = [
            'name' => 'required|max:100',
            'gender' => 'required|max:8|in:male,female',
            'country' => 'required|max:100'
        ];

        return $rules;
    }
}
