<?php

namespace App\Http\Requests\Post;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
        public function authorize(): bool
    {
        return true;
    }
    
    /**
     * Prepare the data for validation.
     * 
     * @return void
     */
    protected function prepareForValidation(){
    
    $this->merge([
                'body'              => Str::lower($this->body),
                'meta_description'  => Str::ucfirst($this->meta_description),
                'keywords'          => Str::lower($this->keywords)
                ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules=[
            'title'            => ['nullable','string','max:255'],
            'body'             => ['nullable','string','max:5000'],
            'meta_description' => ['nullable','string','max:255'],
            'category'         => ['nullable','string','max:255'],
            'tags'             => ['nullable','string','regex:/^([A-Za-z0-9_-]+)(,\s*[A-Za-z0-9_-]+)*$/','max:255'],
            'slug'             => ['nullable','string',Rule::unique('posts')->ignore($this->route('post')), 'regex:/^[a-z0-9-]+$/'],
            'is_published'     => ['nullable','boolean'],
        ];
        return $rules;
    }

    /**
     *  Get the error messages for the defined validation rules.
     * 
     *  @return array<string, string>
     */
    public function messages():array
    {
        return[
            'title.max'             => 'The length of the title may not be more than 255 characters.',
            'category.max'          => 'The length of the category may not be more than 255 characters.',
            'body.max'              => 'The length of the body may not be more than 5000 characters.',
            'meta_description.max'  => 'The length of the meta_description may not be more than 255 characters.',
            'tags.regex'            => 'Tag format is incorrect',
            'tags.max'              => 'The length of the tags may not be more than 5000 characters.',
            'slug.unique'           => 'The slug must be unique and not duplicate.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     * 
     * @param  \Illuminate\Validation\Validator  $validator
     * 
     * @return void
     */
    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json
            ([
                'success' => false,
                'message' => 'Data validation error',
                'errors'  => $validator->errors()
            ] , 422));
    }
}


