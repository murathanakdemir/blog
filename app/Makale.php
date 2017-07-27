<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Makale extends Model
{
    protected $table='makaleler';
    protected $fillable=['baslik','slug','icerik','user_id','kategori_id','durum'];
    protected $appends=['thumb'];


    public function user(){
        return $this->belongsTo('App\User');
    }
    public function kategori(){
        return $this->belongsTo('App\Kategori');
    }
    public function resim(){
        return $this->morphOne('App\Resim','imageable');
    }

    public function getThumbAttribute(){
        $resim=asset('uploads/thumb_'.$this->resim()->first()->isim);
        return '<img src="'.$resim.'" class="img-thumbnail" width=150>';
    }

}
