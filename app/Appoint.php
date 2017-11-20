<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Appoint extends Model
{
     protected $fillable = ['tel','gender','time','time_e','date','staff','detail','user_id','ip','id_ser','status','comment'];
     public function user() {
     	return $this->belongsTo(User::class);
     }

     

     
}
