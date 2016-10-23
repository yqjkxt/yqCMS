<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions',function( Blueprint $blueprint ){
            $blueprint->increments('id');
            $blueprint->string('name');
            $blueprint->string('allow_url');
            $blueprint->smallInteger('is_show')->default(1)->comment('1:显示，0：不显示');
            $blueprint->smallInteger('type')->default(0)->comment('0:顶级菜单，1二级菜单...');
            $blueprint->integer('parent_id')->default(0)->comment('上级菜单');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'permissions' );
    }
}
