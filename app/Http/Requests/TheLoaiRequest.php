<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheLoaiRequest extends FormRequest
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
            'txtCateName'=>'required|min:3|max:100|unique:theloai,Ten'
        ];
    }

    public function messages(){
      return [
        'txtCateName.required'=>'Vui long nhap Tên Thể Loại',
        'txtCateName.min' =>'Vui lòng nhập nhiều hơn 3 ký tự',
        'txtCateName.max' =>'Vui lòng nhập ít hơn 100 ký tự',
        'txtCateName.unique'=>'Tên Thể Loại Đã Tồn Tại rồi'
      ];
    }
}
