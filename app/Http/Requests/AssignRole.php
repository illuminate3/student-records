<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignRole extends FormRequest
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
			$input = $this->request->get('class');
			$name = $input[0]."-".$input[1];

			$rules = [
				'class' => 'required|unique:grades,slug'
			];

			return $rules;
    }

		public function messages()
		{

		}
}
