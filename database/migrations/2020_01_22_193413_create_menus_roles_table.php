<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('role_id');
            $table->foreign('role_id','fk_menus_roles_roles')->references('id')->on('roles')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedbigInteger('menu_id');
            $table->foreign('menu_id','fk_menus_roles_menus')->references('id')->on('menus')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('menus_roles');
    }
}
