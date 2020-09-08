<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                'title' => 'required|min:5|max:199',
                'body' => 'required|min:5',
                'thumbnail' => 'image|mimes:png,jpg,svg,jpeg|max:2048',
                'author' => 'required|min:3|max:20'

        ];
    }

    // public function message(){
    //     return [
    //         'title.required' => 'Harus diisi',
    //         'body.required' => 'Harus diisi',
    //         'author.required' => 'Harus diisi',
    //         'title.max' => 'Title tidak boleh lebih dari 199 kata',
    //         'author.max' => 'Nama tidak boleh lebih dari 20 kata'
    //     ];
    // }
}
