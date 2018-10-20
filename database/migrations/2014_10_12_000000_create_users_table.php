<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('gender')->default('bi-sexual');
            $table->string('country')->default('none');
            $table->string('city')->default('none');
            $table->string('longitude')->default('none');
            $table->string('latitude')->default('none');
            $table->string('avatar')->default('/img/incognito.png');
            $table->string('photo1')->default('/img/incognito.png');
            $table->string('photo2')->default('/img/incognito.png');
            $table->string('photo3')->default('/img/incognito.png');
            $table->string('photo4')->default('/img/incognito.png');
            $table->string('short_info')->default('none');
            $table->integer('age')->default(18);
            $table->date('birth_date')->default('1977-10-10');
            $table->tinyInteger('check_location')->default(1);
            $table->tinyInteger('status')->default(0);
            $table->string('sexpreferences')->default('none');;
            $table->integer('fame_rating')->default(0);
            $table->string('first_name')->default('none');
            $table->string('last_name')->default('none');
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
        Schema::dropIfExists('users');
    }
}
