<?php

namespace App\Http\Requests;

use App\Models\Banner;
use App\Models\News;
use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=>[
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
            /** @var Banner $banner */
            if($banner=$this->route('banner')){
                $banner->deleteImage();
            }

            $data['image_path']=$this->file('image')->store('public/images');
        }
        return $data;
    }
}
