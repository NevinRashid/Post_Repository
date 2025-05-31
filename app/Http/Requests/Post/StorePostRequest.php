<?php

namespace App\Http\Requests\Post;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Str;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     * @return bool
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
                'slug'              => Str::slug($this->slug ?: $this->title),
                'is_published'      => $this->is_published ?: false,
                'body'              => Str::lower($this->body),
                'meta_description'  => Str::ucfirst($this->meta_description),
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
            'title'            => ['required','string','max:255'],
            'body'             => ['required','string','max:5000'],
            'meta_description' => ['nullable','string','max:255'],
            'category'         => ['required','string','max:255'],
            'tags'             => ['nullable','string','regex:/^([A-Za-z0-9_-]+)(,\s*[A-Za-z0-9_-]+)*$/','max:255'],
            'slug'             => ['required','string','unique:posts,slug', 'regex:/^[a-z0-9-]+$/'],
            'is_published'     => ['required','boolean'],
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
            'title.required'        => 'The title is required please.',
            'title.max'             => 'The length of the title may not be more than 255 characters.',
            'category.required'     => 'The category is required please.',
            'category.max'          => 'The length of the category may not be more than 255 characters.',
            'body.required'         => 'The body is required please.',
            'body.max'              => 'The length of the body may not be more than 5000 characters.',
            'meta_description.max'  => 'The length of the meta_description may not be more than 255 characters.',
            'tags.regex'            => 'Tag format is incorrect',
            'tags.max'              => 'The length of the tags may not be more than 5000 characters.',
            'slug.required'         => 'The slug is required please.',
            'slug.unique'           => 'The slug must be unique and not duplicate.',
            'is_published.required' => 'There must be a value for this field',
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

