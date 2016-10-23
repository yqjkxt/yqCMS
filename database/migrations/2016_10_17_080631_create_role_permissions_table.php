<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions',function(Blueprint $blueprint){
            $blueprint->increments('id');
            $blueprint->integer('role_id');
            $blueprint->integer('permission_id');
            $blueprint->index('role_id');
            $blueprint->index('permission_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'role_permissions' );
    }
}
