<?php

namespace App\Http\Requests;

use App\Models\News;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'=>[
                'required', 'string'
            ],
            'text_content'=>[
                'required', 'string'
            ],
            'image'=>[
                'nullable','file','image'
            ]
        ];
    }
    function validatedWithImage(){
        $data=$this->validated();
        if($this->hasFile('image')){
            /** @var News $news */
            if($news=$this->route('news')){
                $news->deleteImage();
            }

            $data['image_path']=$this->file('image')->store('public/images');
        }

        return $data;
    }
}
