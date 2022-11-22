<?php


namespace OnlineStationary\Category\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'category'      => 'string|min:3|regex:/[a-z]/|regex:/[A-Z]/'
        ];
    }

}
