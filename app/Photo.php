<?php

namespace App;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Database\Eloquent\Model;


class Photo extends Model
{
    protected $baseDir = 'flyer/photos';
    protected $table = 'flyer_photos';
    protected $fillable = ['path'];
    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }
    public static function fromForm(UploadedFile $file)
    {
        $photo = new static;
        $name = time().$file->getClientOriginalName();
        $photo->path = $photo->baseDir. '/'.$name;
        $file->move($photo->baseDir ,$name);
        return $photo;
    }
}
