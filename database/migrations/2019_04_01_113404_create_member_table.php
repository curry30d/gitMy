<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',20)->notNull();
            $table->string('password')->notNull();
            $table->enum('gender',[1,2,3])->notNull()->default('1');
            $table->string('mobie',11);
            $table->string('email',40);
            $table->string('avatar',40);

            $table->timestamps();
            $table->rememberToken();
            $table->enum('type',[1,2])->notNUll()->default('1');
            $table->enum('status',[1,2])->notNUll()->default('2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
