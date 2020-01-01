<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text_1',250)->nullable();
            $table->string('text_2',250)->nullable();
            $table->string('image',250);
            $table->unsignedbigInteger('user_id');
            $table->foreign('user_id','fk_banners_users')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedTinyInteger('order');
            $table->unsignedTinyInteger('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
