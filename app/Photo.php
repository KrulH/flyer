<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table = 'flyer_photos'; // tablo normalde modelin sonuna s getirilmiş
    // hali oluyor bunu değiştirmek için eklendi bu

    protected $fillable = ['path', 'name', 'thumbnail_path'];

    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }

    public function baseDir()
    {
        return 'images/photos';
    }
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name; // $photo->name = 'new.jpg';
        $this->path = $this->baseDir().'/'. $name;
        $this->thumbnail_path = $this->baseDir().'/tn-'. $name;
    }



}
