<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('role_id');
            $table->foreign('role_id','fk_permissions_roles_roles')->references('id')->on('roles')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedbigInteger('permission_id');
            $table->foreign('permission_id','fk_permissions_roles_permissions')->references('id')->on('permissions')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('permissions_roles');
    }
}
