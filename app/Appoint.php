<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Appoint extends Model
{
     protected $fillable = ['tel','gender','service','time','date','staff','detail','user_id','ip'];
     public function user() {
     	return $this->belongsTo(User::class);
     }

     

     
}
