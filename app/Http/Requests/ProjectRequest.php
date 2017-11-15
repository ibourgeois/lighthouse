<?php

namespace Lighthouse\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lighthouse\Project;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->route()->action['as'] === 'projects.store') {
            return true;
        } else {
            $project = $this->route('project');

            return $project && $this->user()->can('update', $project);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'min:2|max:255|required|alpha_dash|unique:projects,id,'.$this->id,
        ];
    }
}
