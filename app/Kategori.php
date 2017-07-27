<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use Sluggable;
    protected $table='kategoriler';
    protected $fillable=['baslik','slug'];
    protected $appends=['thumb'];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'baslik'
            ]
        ];
    }

    public function resim(){
        return $this->morphOne('App\Resim','imageable');
    }

    public function getThumbAttribute(){
        $resim=asset('uploads/thumb_'.$this->resim()->first()->isim);
        return '<img src="'.$resim.'" class="img-thumbnail" width=150>';
    }
}
