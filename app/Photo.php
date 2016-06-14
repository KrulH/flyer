<?php

namespace App;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;


class Photo extends Model
{
    protected $baseDir = 'flyer/photos';
    protected $table = 'flyer_photos';
    protected $fillable = ['path','name','thumbnail_path'];
    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }
    public static function named($name)
    {
//        $photo = new static;
//        return $photo->saveAs($name);
        return (new static)->saveAs($name);

    }
    public function saveAs($name)
    {
        $this->name = sprintf("%s-%s", time(),$name);
        $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);
        return $this;

    }
    public function move(UploadedFile $file) // store
    {
        $file->move($this->baseDir ,$this->name);
        $this->makeThumbnail();
        return $this;
    }
    public function makeThumbnail()
    {
        Image::make($this->path)
            ->fit(200)
            ->save($this->thumbnail_path);
    }
}
