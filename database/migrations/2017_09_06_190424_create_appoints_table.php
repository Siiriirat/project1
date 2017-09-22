<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAppointsTable extends Migration
{
    public function up()    {
        Schema::create('appoints', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tel');
            $table->string('gender');
            $table->string('service');
            $table->string('date');
            $table->string('time');
            $table->string('staff');
            $table->string('detail',1000);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ip',20);
            $table->timestamps();
        });
    }
    public function down()
    {
         Schema::drop('appoints');
    }
}