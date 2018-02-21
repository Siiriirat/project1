<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    //
    protected $fillable = ['topic_info','date_info','detail_info','picture_info','type_info'];
    public function user() {
     	return $this->belongsTo(User::class);
     }
     protected $primaryKey = 'id_info';
}
