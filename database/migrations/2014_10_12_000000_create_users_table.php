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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('company_name')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('status')->default(1);
            $table->date('dob')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('role')->default(2);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('path')->nullable();
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
