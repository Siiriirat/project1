<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Service extends Model
{
     protected $fillable = ['name_ser','type','cost','detail','sp_time'];
     public function user() {
     	return $this->belongsTo(User::class);
     }
     protected $primaryKey = 'id_ser';
}
