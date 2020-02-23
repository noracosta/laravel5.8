<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('role_id');
            $table->foreign('role_id','fk_users_roles_roles')->references('id')->on('roles')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedbigInteger('user_id');
            $table->foreign('user_id','fk_users_roles_users')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('state');
            $table->timestamps();
            $table->charse = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_roles');
    }
}
