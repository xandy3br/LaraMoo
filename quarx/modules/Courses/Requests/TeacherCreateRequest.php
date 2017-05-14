<?php

namespace Quarx\Modules\Courses\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Quarx\Modules\Courses\Models\Teacher;

class TeacherCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Teacher::$rules;
    }
}
