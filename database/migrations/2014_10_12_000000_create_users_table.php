<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('birth_day', 55);
            $table->string('phone', 55);
            $table->string('telegram', 55)->nullable();
            $table->integer('category');
            $table->string('seat', 55);
            $table->integer('standing');
            $table->string('rank', 55)->nullable();
            $table->string('awards', 55)->nullable();
            $table->string('org_name', 255);
            $table->string('address', 255);
            $table->string('region', 55);
            $table->integer('form');
            $table->string('location', 1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('ip_address', 55);
            $table->integer('competition_member');
            $table->string('avatar', 255)->nullable();
            $table->rememberToken();
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
