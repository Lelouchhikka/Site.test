<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'image_path', ];
    function deleteImage(){
        if(!$this->image_path)
            return;
        $path=storage_path('app/' . $this->image_path);

        if(file_exists($path))
            unlink($path);
    }
}
